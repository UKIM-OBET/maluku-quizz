<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index()
    {
        $this->authorizeStudent();

        $quizzes = Quiz::withCount('questions')->get();

        return view('student.quizzes.index', compact('quizzes'));
    }

    public function take($quizId)
    {
        $this->authorizeStudent();

        $quiz = Quiz::with('questions')->findOrFail($quizId);

        return view('student.quizzes.take', compact('quiz'));
    }

    public function submit(Request $request, $quizId)
    {
        $this->authorizeStudent();

        $quiz = Quiz::with('questions')->findOrFail($quizId);
        $userId = Session::get('user_id');

        $answers = $request->input('answers', []);
        $textAnswers = $request->input('answers_text', []);
        $score = 0;

        foreach ($quiz->questions as $question) {
            $submitted = null;

            if (isset($answers[$question->id]) && $answers[$question->id] !== '') {
                $submitted = $answers[$question->id];
            } elseif (isset($textAnswers[$question->id]) && trim($textAnswers[$question->id]) !== '') {
                $submitted = trim($textAnswers[$question->id]);
            }

            if ($submitted !== null && strcasecmp($submitted, trim($question->answer)) === 0) {
                $score += 10;
            }
        }

        // Calculate points awarded based on score percentage
        $maxScore = count($quiz->questions) * 10;
        $scorePercentage = $maxScore > 0 ? ($score / $maxScore) * 100 : 0;
        $pointsAwarded = intval(($scorePercentage / 100) * ($quiz->points ?? 0));

        // Create quiz result
        QuizResult::create([
            'user_id' => $userId,
            'quiz_id' => $quiz->id,
            'score' => $score,
            'points_awarded' => $pointsAwarded,
            'completed_at' => now(),
        ]);

        // Award points to user
        $user = User::findOrFail($userId);
        $user->addPoints($pointsAwarded);

        return Redirect::route('student.leaderboard')->with('success', "Skor Anda: {$score}, Poin yang diperoleh: {$pointsAwarded}");
    }

    protected function authorizeStudent()
    {
        if (Session::get('user_role') !== 'murid') {
            abort(403, 'Hanya murid yang dapat mengakses halaman ini.');
        }
    }
}
