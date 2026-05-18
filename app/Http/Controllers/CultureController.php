<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CultureController extends Controller
{
    protected function currentUser()
    {
        return User::find(Session::get('user_id'));
    }

    public function teacherDashboard()
    {
        $this->authorizeTeacher();

        $cultures = Culture::count();

        return view('teacher.dashboard', compact('cultures'));
    }

    public function index()
    {
        $this->authorizeTeacher();

        $cultures = Culture::latest()->get();

        return view('teacher.cultures.index', compact('cultures'));
    }

    public function create()
    {
        $this->authorizeTeacher();

        return view('teacher.cultures.create');
    }

    public function store(Request $request)
    {
        $this->authorizeTeacher();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        Culture::create($data);

        return Redirect::route('teacher.cultures.index')->with('success', 'Informasi budaya berhasil ditambahkan.');
    }

    public function edit(Culture $culture)
    {
        $this->authorizeTeacher();

        return view('teacher.cultures.edit', compact('culture'));
    }

    public function update(Request $request, Culture $culture)
    {
        $this->authorizeTeacher();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        $culture->update($data);

        return Redirect::route('teacher.cultures.index')->with('success', 'Informasi budaya berhasil diperbarui.');
    }

    public function destroy(Culture $culture)
    {
        $this->authorizeTeacher();

        $culture->delete();

        return Redirect::route('teacher.cultures.index')->with('success', 'Informasi budaya berhasil dihapus.');
    }

    public function studentDashboard()
    {
        $this->authorizeStudent();

        $cultures = Culture::count();

        return view('student.dashboard', compact('cultures'));
    }

    public function studentCultures()
    {
        $this->authorizeStudent();

        $cultures = Culture::latest()->get();

        return view('student.cultures', compact('cultures'));
    }

    protected function authorizeTeacher()
    {
        if (Session::get('user_role') !== 'guru') {
            abort(403, 'Hanya guru yang dapat mengakses halaman ini.');
        }
    }

    protected function authorizeStudent()
    {
        if (Session::get('user_role') !== 'murid') {
            abort(403, 'Hanya murid yang dapat mengakses halaman ini.');
        }
    }
}
