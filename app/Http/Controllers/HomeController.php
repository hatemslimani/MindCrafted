<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user->category === null || $user->category === 0) {
            return view('auth.pending_access');
        }
        if($user->category === 1) {
            return $this->adminHome();
        }
        elseif($user->category === 2) {
            return $this->teacherHome();
        }
        else {
            return $this->studentHome($user);
        }
    }
    public function adminHome()
    {
        // Statistiques actuelles
        $totalStudents = User::where('category', 3)->count();
        $totalTeachers = User::where('category', 2)->count();
        $totalGroups = DB::table('groupe')->count();
        $totalSections = DB::table('section')->count();

        // Statistiques de la semaine dernière
        $lastWeekStudents = User::where('category', 3)
            ->where('created_at', '<=', now()->subWeek())
            ->count();
        $lastWeekTeachers = User::where('category', 2)
            ->where('created_at', '<=', now()->subWeek())
            ->count();
        $lastWeekGroups = DB::table('groupe')
            ->where('created_at', '<=', now()->subWeek())
            ->count();
        $lastWeekSections = DB::table('section')
            ->where('created_at', '<=', now()->subWeek())
            ->count();

        // Calcul des nouveaux éléments cette semaine
        $newStudents = User::where('category', 3)
            ->whereBetween('created_at', [now()->subWeek(), now()])
            ->count();
        $newTeachers = User::where('category', 2)
            ->whereBetween('created_at', [now()->subWeek(), now()])
            ->count();
        $newGroups = DB::table('groupe')
            ->whereBetween('created_at', [now()->subWeek(), now()])
            ->count();
        $newSections = DB::table('section')
            ->whereBetween('created_at', [now()->subWeek(), now()])
            ->count();

        // Calcul des tendances en pourcentage
        $studentsTrend = $lastWeekStudents > 0 ? ($newStudents / $lastWeekStudents) * 100 : $newStudents * 100;
        $teachersTrend = $lastWeekTeachers > 0 ? ($newTeachers / $lastWeekTeachers) * 100 : $newTeachers * 100;
        $groupsTrend = $lastWeekGroups > 0 ? ($newGroups / $lastWeekGroups) * 100 : $newGroups * 100;
        $sectionsTrend = $lastWeekSections > 0 ? ($newSections / $lastWeekSections) * 100 : $newSections * 100;

        // Arrondir les tendances
        $studentsTrend = round($studentsTrend, 1);
        $teachersTrend = round($teachersTrend, 1);
        $groupsTrend = round($groupsTrend, 1);
        $sectionsTrend = round($sectionsTrend, 1);

        $recentActivities = DB::table('users')
            ->where('created_at', '>=', now()->subDays(7))
            ->select('name as description', 'created_at', DB::raw("'fa-user-plus' as icon"))
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.home', compact(
            'totalStudents',
            'totalTeachers',
            'totalGroups',
            'totalSections',
            'studentsTrend',
            'teachersTrend',
            'groupsTrend',
            'sectionsTrend',
            'recentActivities'
        ));
    }

    public function teacherHome()
    {
        $user = Auth::user();

        // Statistiques
        $totalStudents = DB::table('users')
            ->join('section', 'users.idGroup', '=', 'section.group_id')
            ->where('section.teacher_id', $user->id)
            ->where('users.category', 3)
            ->distinct('users.id')
            ->count();

        $totalSections = DB::table('section')
            ->where('teacher_id', $user->id)
            ->count();

        $totalTests = DB::table('test')
            ->join('section', 'test.idSection', '=', 'section.id')
            ->where('section.teacher_id', $user->id)
            ->count() + 
            DB::table('exam')
            ->join('section', 'exam.idSection', '=', 'section.id')
            ->where('section.teacher_id', $user->id)
            ->count();

        // Sections récentes
        $recentSections = DB::table('section')
            ->where('teacher_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function($section) {
                $section->students_count = DB::table('users')
                    ->where('idGroup', $section->group_id)
                    ->where('category', 3)
                    ->count();

                $section->content_count = DB::table('course')
                    ->where('section_id', $section->id)
                    ->count() +
                    DB::table('test')
                    ->where('idSection', $section->id)
                    ->count() +
                    DB::table('exam')
                    ->where('idSection', $section->id)
                    ->count();

                return $section;
            });

        return view('teacher.home', compact(
            'totalStudents',
            'totalSections',
            'totalTests',
            'recentSections'
        ));
    }

    public function studentHome($user)
    {
        // Statistiques pour l'étudiant
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

        $recentCourses = DB::table('course')
            ->join('section', 'course.section_id', '=', 'section.id')
            ->where('section.group_id', $user->idGroup)
            ->select('course.*', 'section.namesection as section', 'section.group_id')
            ->orderBy('course.created_at', 'desc')
            ->limit(5)
            ->get();

        // Tests à venir
        $upcomingTests = DB::table('test')
            ->join('section', 'test.idSection', '=', 'section.id')
            ->where('section.group_id', $user->idGroup)
            ->select('test.name', 'test.created_at as date', 'test.catg as type')
            ->union(
                DB::table('exam')
                ->join('section', 'exam.idSection', '=', 'section.id')
                ->where('section.group_id', $user->idGroup)
                ->select('exam.name', 'exam.created_at as date', 'exam.catg as type')
            )
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        return view('user.home', compact('totalCourses', 'completedTests', 'averageScore', 
                                    'recentCourses', 'upcomingTests'));
    }
}
