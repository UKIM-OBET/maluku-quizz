<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Support\Facades\Session;

class ProgressController extends Controller
{
    public function index()
    {
        $this->authorizeTeacher();

        $progress = QuizResult::with('user', 'quiz')
            ->orderByDesc('score')
            ->get();

        $totalResults = $progress->count();
        $uniqueStudents = $progress->pluck('user_id')->unique()->count();
        $averageScore = $progress->count() ? round($progress->avg('score'), 1) : 0;

        return view('teacher.progress', compact('progress', 'totalResults', 'uniqueStudents', 'averageScore'));
    }

    protected function authorizeTeacher()
    {
        if (Session::get('user_role') !== 'guru') {
            abort(403, 'Hanya guru yang dapat mengakses halaman ini.');
        }
    }
}
