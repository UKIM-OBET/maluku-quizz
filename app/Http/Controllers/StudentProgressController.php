<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Session;

class StudentProgressController extends Controller
{
    public function index()
    {
        $this->authorizeStudent();

        $studentId = Session::get('user_id');
        $totalQuizzes = Quiz::count();

        $results = QuizResult::with('quiz')
            ->where('user_id', $studentId)
            ->orderByDesc('completed_at')
            ->get()
            ->unique('quiz_id')
            ->values();

        $attemptedQuizzes = $results->count();
        $progressPercent = $totalQuizzes ? round($attemptedQuizzes / $totalQuizzes * 100) : 0;

        return view('student.progress', compact('results', 'totalQuizzes', 'attemptedQuizzes', 'progressPercent'));
    }

    protected function authorizeStudent()
    {
        if (Session::get('user_role') !== 'murid') {
            abort(403, 'Hanya murid yang dapat mengakses halaman ini.');
        }
    }
}
