<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Accessed admin dashboard',
            'subject_type' => null,
            'subject_id' => null,
            'properties' => null
        ]);

        return view('admin.index', ['title' => 'Dashboard']);
    }

    public function logout(Request $request)
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Logged out from system',
            'subject_type' => null,
            'subject_id' => null,
            'properties' => null
        ]);

        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Berhasil keluar dari sistem');
    }

    public function content()
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Accessed content management',
            'subject_type' => null,
            'subject_id' => null,
            'properties' => null
        ]);

        return view('admin.content', ['title' => 'Content Management']);
    }

    public function account()
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Accessed account management',
            'subject_type' => null,
            'subject_id' => null,
            'properties' => null
        ]);

        $users = User::all();
        return view('admin.account', ['title' => 'Account Management', 'users' => $users]);
    }

    public function edit(User $user)
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => "Editing user: {$user->full_name}",
            'subject_type' => User::class,
            'subject_id' => $user->id,
            'properties' => null
        ]);

        return view('admin.account.edit', ['title' => 'Edit User', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => "Deleted user: {$user->full_name}",
            'subject_type' => User::class,
            'subject_id' => $user->id,
            'properties' => null
        ]);

        $user->delete();
        return redirect()->route('admin.account')->with('success', 'User deleted successfully');
    }

    public function update(User $user, Request $request)
    {
        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => "Updated user: {$user->full_name}",
            'subject_type' => User::class,
            'subject_id' => $user->id,
            'properties' => $request->all()
        ]);

        $user->update($request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,student'
        ]));

        return redirect()->route('admin.account')->with('success', 'User updated successfully');
    }
}
