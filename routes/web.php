<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\TeacherQuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('teacher')->name('teacher.')->middleware(['role:guru'])->group(function () {
        Route::get('dashboard', [CultureController::class, 'teacherDashboard'])->name('dashboard');
        Route::resource('cultures', CultureController::class)->except(['show']);
        Route::resource('quizzes', TeacherQuizController::class)->except(['show']);
        Route::get('quizzes/{quiz}/questions', [TeacherQuizController::class, 'questions'])->name('quizzes.questions.index');
        Route::get('quizzes/{quiz}/questions/create', [TeacherQuizController::class, 'createQuestion'])->name('quizzes.questions.create');
        Route::post('quizzes/{quiz}/questions', [TeacherQuizController::class, 'storeQuestion'])->name('quizzes.questions.store');
        Route::get('quizzes/{quiz}/questions/{question}/edit', [TeacherQuizController::class, 'editQuestion'])->name('quizzes.questions.edit');
        Route::patch('quizzes/{quiz}/questions/{question}', [TeacherQuizController::class, 'updateQuestion'])->name('quizzes.questions.update');
        Route::delete('quizzes/{quiz}/questions/{question}', [TeacherQuizController::class, 'destroyQuestion'])->name('quizzes.questions.destroy');
        Route::get('progress', [ProgressController::class, 'index'])->name('progress');
    });

    Route::middleware(['role:murid'])->group(function () {
        Route::get('/student/dashboard', [CultureController::class, 'studentDashboard'])->name('student.dashboard');
        Route::get('/student/cultures', [CultureController::class, 'studentCultures'])->name('student.cultures');
        Route::get('/student/quizzes', [QuizController::class, 'index'])->name('student.quizzes');
        Route::get('/student/quizzes/{quiz}', [QuizController::class, 'take'])->whereNumber('quiz')->name('student.quizzes.take');
        Route::post('/student/quizzes/{quiz}', [QuizController::class, 'submit'])->whereNumber('quiz')->name('student.quizzes.submit');
        Route::get('/student/progress', [StudentProgressController::class, 'index'])->name('student.progress');
        Route::get('/student/leaderboard', [LeaderboardController::class, 'index'])->name('student.leaderboard');
    });
});
