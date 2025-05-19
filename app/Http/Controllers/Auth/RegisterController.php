<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        
        $user = User::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => 'public'
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
