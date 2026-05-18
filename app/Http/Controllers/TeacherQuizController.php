<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class TeacherQuizController extends Controller
{
    public function index()
    {
        $this->authorizeTeacher();

        $quizzes = Quiz::withCount('questions')->latest()->get();

        return view('teacher.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $this->authorizeTeacher();

        return view('teacher.quizzes.create');
    }

    public function store(Request $request)
    {
        $this->authorizeTeacher();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'points' => 'required|integer|min:0|max:10000',
        ]);

        Quiz::create($data);

        return Redirect::route('teacher.quizzes.index')->with('success', 'Kuis baru berhasil dibuat. Tambahkan soal di halaman kuis.');
    }

    public function edit(Quiz $quiz)
    {
        $this->authorizeTeacher();

        return view('teacher.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $this->authorizeTeacher();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'points' => 'required|integer|min:0|max:10000',
        ]);

        $quiz->update($data);

        return Redirect::route('teacher.quizzes.index')->with('success', 'Kuis berhasil diperbarui.');
    }

    public function destroy(Quiz $quiz)
    {
        $this->authorizeTeacher();

        $quiz->delete();

        return Redirect::route('teacher.quizzes.index')->with('success', 'Kuis berhasil dihapus.');
    }

    public function questions(Quiz $quiz)
    {
        $this->authorizeTeacher();

        $quiz->load('questions');

        return view('teacher.quizzes.questions.index', compact('quiz'));
    }

    public function createQuestion(Quiz $quiz)
    {
        $this->authorizeTeacher();

        return view('teacher.quizzes.questions.create', compact('quiz'));
    }

    public function storeQuestion(Request $request, Quiz $quiz)
    {
        $this->authorizeTeacher();

        $data = $request->validate([
            'question' => 'required|string|max:1000',
            'options' => 'required|array|min:2|max:6',
            'options.*' => 'required|string|max:255',
            'answer_index' => 'required|integer|min:0|max:5',
        ]);

        if (! array_key_exists($data['answer_index'], $data['options'])) {
            return Redirect::back()->withErrors(['answer_index' => 'Jawaban benar harus memilih salah satu opsi.'])->withInput();
        }

        $options = array_values($data['options']);
        $answer = $options[$data['answer_index']];

        QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => $data['question'],
            'options' => $options,
            'answer' => $answer,
        ]);

        return Redirect::route('teacher.quizzes.questions.index', $quiz)->with('success', 'Soal kuis berhasil ditambahkan.');
    }

    public function editQuestion(Quiz $quiz, QuizQuestion $question)
    {
        $this->authorizeTeacher();

        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        return view('teacher.quizzes.questions.edit', compact('quiz', 'question'));
    }

    public function updateQuestion(Request $request, Quiz $quiz, QuizQuestion $question)
    {
        $this->authorizeTeacher();

        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        $data = $request->validate([
            'question' => 'required|string|max:1000',
            'options' => 'required|array|min:2|max:6',
            'options.*' => 'required|string|max:255',
            'answer_index' => 'required|integer|min:0|max:5',
        ]);

        if (! array_key_exists($data['answer_index'], $data['options'])) {
            return Redirect::back()->withErrors(['answer_index' => 'Jawaban benar harus memilih salah satu opsi.'])->withInput();
        }

        $options = array_values($data['options']);
        $answer = $options[$data['answer_index']];

        $question->update([
            'question' => $data['question'],
            'options' => $options,
            'answer' => $answer,
        ]);

        return Redirect::route('teacher.quizzes.questions.index', $quiz)->with('success', 'Soal kuis berhasil diperbarui.');
    }

    public function destroyQuestion(Quiz $quiz, QuizQuestion $question)
    {
        $this->authorizeTeacher();

        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        $question->delete();

        return Redirect::route('teacher.quizzes.questions.index', $quiz)->with('success', 'Soal kuis berhasil dihapus.');
    }

    protected function authorizeTeacher()
    {
        if (Session::get('user_role') !== 'guru') {
            abort(403, 'Hanya guru yang dapat mengakses halaman ini.');
        }
    }
}
