<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        
        Session::regenerate();
        
        // Check user role and redirect accordingly
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.index');
        }
        
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        Session::invalidate();
        Session::regenerateToken();
        
        return redirect('/login');
    }
}
