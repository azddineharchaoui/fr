<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::get('/jobs/category/{category}', [JobController::class, 'byCategory'])->name('jobs.byCategory');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::post('/newsletter/subscribe', function () {
    // Add newsletter subscription logic here
    return redirect()->route('home')->with('success', 'Subscribed successfully!');
})->name('newsletter.subscribe');

// Authentication Routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Routes pour les offres d'emploi
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');
Route::post('/jobs/{job}/apply', [JobController::class, 'submitApplication'])->name('jobs.submitApplication');
Route::get('/jobs/category/{category}', [JobController::class, 'byCategory'])->name('jobs.byCategory');
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');