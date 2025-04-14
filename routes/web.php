<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page
Route::get('/', function () {
    return redirect()->route('jobs.index');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Job Routes
Route::get('/jobs', [JobController::class, 'index'])->middleware('auth');
// Or for groups:
Route::middleware(['auth'])->group(function () {
    Route::resource('jobs', JobController::class);
});
// Job Application Routes
Route::get('/applications', [JobApplicationController::class, 'index'])->name('jobs.applications.index');
Route::get('/jobs/{job}/apply', [JobApplicationController::class, 'create'])->name('jobs.applications.create');
Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.applications.store');
Route::get('/applications/{application}', [JobApplicationController::class, 'show'])->name('jobs.applications.show');

// Profile Route
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
});