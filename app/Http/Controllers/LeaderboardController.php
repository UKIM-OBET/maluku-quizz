<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LeaderboardController extends Controller
{
    public function index()
    {
        $this->authorizeStudent();

        // Get ranking based on total points
        $ranking = User::where('role', 'murid')
            ->orderByDesc('total_points')
            ->take(20)
            ->get();

        $studentId = Session::get('user_id');
        $student = User::findOrFail($studentId);

        $studentResults = QuizResult::with('quiz')
            ->where('user_id', $studentId)
            ->orderByDesc('completed_at')
            ->get()
            ->unique('quiz_id')
            ->values();

        $totalQuizzes = Quiz::count();
        $attemptedQuizzes = $studentResults->pluck('quiz_id')->unique()->count();
        $progressPercent = $totalQuizzes ? round($attemptedQuizzes / $totalQuizzes * 100) : 0;

        return view('student.leaderboard', compact('ranking', 'student', 'studentResults', 'totalQuizzes', 'attemptedQuizzes', 'progressPercent'));
    }

    protected function authorizeStudent()
    {
        if (Session::get('user_role') !== 'murid') {
            abort(403, 'Hanya murid yang dapat mengakses halaman ini.');
        }
    }
}
