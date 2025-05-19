<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/programs', function () {
    return view('programs');
})->name('programs');

Route::get('/event', function () {
    return view('event');
})->name('event');

// Students Routes
Route::get('/students', [\App\Http\Controllers\StudentsController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [\App\Http\Controllers\StudentsController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [\App\Http\Controllers\StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [\App\Http\Controllers\StudentsController::class, 'update'])->name('students.update');

// Authentication Routes
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');

// Password Routes
Route::get('/password/change', [\App\Http\Controllers\Auth\PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/password/change', [\App\Http\Controllers\Auth\PasswordController::class, 'changePassword'])->name('password.update');

// Password Reset Routes
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes
Route::prefix('admin')->middleware([
    \Illuminate\Auth\Middleware\Authenticate::class,
    \App\Http\Middleware\AdminMiddleware::class
])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/content', [AdminController::class, 'content'])->name('admin.content');
    Route::get('/account', [AdminController::class, 'account'])->name('admin.account');
    Route::get('/account/{user}/edit', [AdminController::class, 'edit'])->name('admin.account.edit');
    Route::put('/account/{user}', [AdminController::class, 'update'])->name('admin.account.update');
    Route::delete('/account/{user}', [AdminController::class, 'destroy'])->name('admin.account.delete');
});
