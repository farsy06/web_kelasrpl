<?php

namespace App\Http\Controllers;

use App\Models\User;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')
            ->orderBy('full_name')
            ->get();

        return view('students.index', compact('students'), ['title' => 'Students']);
    }

    public function show(User $student)
    {
        if ($student->role !== 'student') {
            abort(404);
        }

        $sosmed = $student->sosmed ?? null;

        return view('students.show', compact('student', 'sosmed'), ['title' => $student->full_name]);
    }
}
