<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courseModel;
use App\User;
use App\TestModel;
use App\ExamModel;
use App\QuestionExamenModel;
use App\optionExamenQuestion;
use App\QuestionTestModel;
use App\OptionTestQuestion;
use App\resultatModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\section;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getMesSection()
    {
        $groupId = Auth::user()->idGroup;

        $section = DB::table('section')
            ->select('section.*', 'users.name')
            ->join('users', 'section.teacher_id', '=', 'users.id')
            ->where('section.group_id', $groupId)
            ->get()
            ->map(function ($sec) {
                $sec->courses_count = DB::table('course')
                    ->where('section_id', $sec->id)
                    ->count();

                $sec->tests_count = DB::table('test')
                    ->where('idSection', $sec->id)
                    ->count() +
                    DB::table('exam')
                    ->where('idSection', $sec->id)
                    ->count();

                return $sec;
            });

        return view('user.sections', compact('section'));
    }
    public function getMesCours($id)
    {
        $results = DB::select(
            'select id, name, description, catg, created_at, updated_at from exam where idSection = :iid1 
            union select id, name, description, catg, created_at, updated_at from test where idSection = :iid2 
            union select id, name, description, catg, created_at, updated_at from course where section_id = :iid3 
            ORDER BY created_at DESC',
            ['iid1' => $id, 'iid2' => $id, 'iid3' => $id]
        );

        $section = DB::table('section')
            ->select('namesection')
            ->where('section.id', $id)
            ->first();

        return view('user.section_details', [
            'data' => $results,
            'id' => $id,
            'namesection' => $section->namesection
        ]);
    }
    public function genratePdf($id)
    {
        $d = courseModel::find($id);
        $data = $d->content;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($data);
        return $pdf->stream();
    }
    public function getExam($id)
    {
        $data = ExamModel::find($id);

        if ($data) {
            $question = QuestionExamenModel::where('idExamen', $id)->get();
            $tt = [];
            foreach ($question as $item) {
                $tt[$item->id] = optionExamenQuestion::where('idQuestion', $item->id)->get();
            }
            return view('user/examen', ['question' => $question, 'option' => $tt, 'data' => $data, 'id' => $id]);
        } else {
            return back();
        }
    }
    public function getTest($id)
    {
        $data = TestModel::find($id);
        if ($data) {
            $question = QuestionTestModel::where('idTest', $id)->get();
            $tt = [];
            foreach ($question as $item) {
                $tt[$item->id] = OptionTestQuestion::where('idQuestion', $item->id)->get();
            }
            return view('user/test', ['question' => $question, 'option' => $tt, 'data' => $data, 'id' => $id]);
        } else {
            return back();
        }
    }
    public function storeOptiontest(Request $request, $id)
    {
        $data = TestModel::find($id);
        $question = QuestionTestModel::where('idTest', $id)->get();
        $score = 0;
        foreach ($question as $item) {
            $optionCorrect = DB::select('select options  from option_question_test where idQuestion= :idd and is_correct= :is', ['idd' => $item->id, 'is' => 1]);
            if ($request->input($item->id)) {
                if ($request->input($item->id) == $optionCorrect[0]->options) {
                    $score = $score + (20 / count($question));
                }
            }
        }
        $grp = new resultatModel();
        $grp->name = $data->name;
        $grp->categorie = "test";
        $grp->moyen = $score;
        $grp->idUser = Auth::id();
        $grp->idSection = $data->idSection;
        $grp->save();
        return redirect('/home');
    }
    public function storeOptionExam(Request $request, $id)
    {
        $data = ExamModel::find($id);
        $question = QuestionExamenModel::where('idExamen', $id)->get();
        $score = 0;
        foreach ($question as $item) {
            $optionCorrect = DB::select('select options  from option_question_examen where idQuestion = :idd and 	is_correct= :is', ['idd' => $item->id, 'is' => 1]);
            if ($request->input($item->id)) {
                if ($request->input($item->id) == $optionCorrect[0]->options) {
                    $score = $score + (20 / count($question));
                }
            }
        }
        $grp = new resultatModel();
        $grp->name = $data->name;
        $grp->categorie = "exam";
        $grp->moyen = $score;
        $grp->idUser = Auth::id();
        $grp->idSection = $data->idSection;
        $grp->save();
        return redirect('/home');
    }
    public function getHistorique($id)
    {
        $section = section::find($id);
        $data = resultatModel::where('idSection', $id)->get();
        return view('user/historique', ['section' => $section, 'data' => $data]);
    }
    public function profile()
    {
        $user = Auth::user();

        if ($user->category == 3) {
            $totalCourses = DB::table('course')
                ->join('section', 'course.section_id', '=', 'section.id')
                ->where('section.group_id', $user->idGroup)
                ->count();

            $completedTests = DB::table('resultat')
                ->where('idUser', $user->id)
                ->count();

            $averageScore = DB::table('resultat')
                ->where('idUser', $user->id)
                ->avg('moyen') ?? 0;

            $averageScore = number_format($averageScore, 1);

            return view('profile', compact('totalCourses', 'completedTests', 'averageScore'));
        }
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'required_with:password',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }
}
