<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::user()->role === 'student') {
            return redirect()->route('students.show', Auth::user());
        }
        return view('profile.index');
    }

    public function edit()
    {
        if (Auth::user()->role === 'student') {
            return redirect()->route('students.edit', Auth::user());
        }
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update($request->only('full_name', 'email'));

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
