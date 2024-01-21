<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\CourseModel;
use App\TestModel;
use App\ExamModel;
use App\QuestionExamenModel;
use App\optionExamenQuestion;
use App\QuestionTestModel;
use App\OptionTestQuestion;


class TeacherController extends Controller
{

    public function getsection()
    {
        $section = DB::table('section')
            ->where('teacher_id', Auth::id())
            ->get()
            ->map(function($sec) {
                $sec->courses_count = DB::table('course')
                    ->where('section_id', $sec->id)
                    ->count();

                $sec->students_count = DB::table('users')
                    ->where('idGroup', $sec->group_id)
                    ->where('category', 3)
                    ->count();

                return $sec;
            });

        return view('teacher.section', compact('section'));
    }

    public function getInfo($id)
    {
        $results = DB::select('select id, name, description, catg, created_at, updated_at from exam where idSection = :iid1 
            union select id, name, description, catg, created_at, updated_at from test where idSection = :iid2 
            union select id, name, description, catg, created_at, updated_at from course where section_id = :iid3 
            ORDER BY created_at DESC', 
            ['iid1' => $id, 'iid2' => $id, 'iid3' => $id]
        );

        return view('teacher.info', ['data' => $results, 'id' => $id]);
    }

    public function addCours(Request $request, $id)
    {
        $course = new CourseModel();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->catg = 'course';
        $course->content = $request->content;
        $course->section_id = $id;
        $course->save();
        
        return back()->with('succ', 'Cours ajouté avec succès');
    }

    public function addExam(Request $request, $id)
    {
        $exam = new ExamModel();
        $exam->name = $request->name;
        $exam->description = $request->description;
        $exam->duree = $request->duree;
        $exam->catg = 'exam';
        $exam->idSection = $id;
        $exam->save();
        
        return back()->with('succ', 'Examen ajouté avec succès');
    }

    public function addTest(Request $request, $id)
    {
        $test = new TestModel();
        $test->name = $request->name;
        $test->description = $request->description;
        $test->duree = $request->duree;
        $test->catg = 'test';
        $test->idSection = $id;
        $test->save();
        
        return back()->with('succ', 'Test ajouté avec succès');
    }

    public function viewExam($id)
    {
        $data = ExamModel::find($id);
        if($data) {
            $question = QuestionExamenModel::where('idExamen', $id)->get();
            $options = [];
            foreach($question as $item) {
                $options[$item->id] = optionExamenQuestion::where('idQuestion', $item->id)->get();
            }
            return view('teacher.examen', [
                'question' => $question,
                'option' => $options,
                'data' => $data,
                'id' => $id
            ]);
        }
        return back();
    }

    public function viewTest($id)
    {
        $data = TestModel::find($id);
        if($data) {
            $question = QuestionTestModel::where('idTest', $id)->get();
            $options = [];
            foreach($question as $item) {
                $options[$item->id] = OptionTestQuestion::where('idQuestion', $item->id)->get();
            }
            return view('teacher.test', [
                'question' => $question,
                'option' => $options,
                'data' => $data,
                'id' => $id
            ]);
        }
        return back();
    }

    public function addQuestion(Request $request, $id)
    {
        $question = new QuestionExamenModel();
        $question->question = $request->question;
        $question->idExamen = $id;
        $question->save();

        foreach($request->option as $key => $opt) {
            $option = new optionExamenQuestion();
            $option->options = $opt;
            $option->is_correct = ($key + 1) == $request->is_correct;
            $option->idQuestion = $question->id;
            $option->idExam = $id;
            $option->save();
        }

        return back()->with('succ', 'Question ajoutée avec succès');
    }

    public function addQuestionTest(Request $request, $id)
    {
        $question = new QuestionTestModel();
        $question->question = $request->question;
        $question->idTest = $id;
        $question->save();

        foreach($request->option as $key => $opt) {
            $option = new OptionTestQuestion();
            $option->options = $opt;
            $option->is_correct = ($key + 1) == $request->is_correct;
            $option->idQuestion = $question->id;
            $option->idTest = $id;
            $option->save();
        }

        return back()->with('succ', 'Question ajoutée avec succès');
    }

    public function generate($id)
    {
        $d=courseModel::find($id);
        $data=$d->content;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($data);
        return $pdf->stream();
    }

}
