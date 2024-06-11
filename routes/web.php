<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PostController::class, 'index']);
Route::get('/home', [PostController::class, 'home']);
Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // TODO UPDATE ALL THESE TO USE THE JETSTREAM/SANCTUM AUTH AS WELL AS ADMIN COLUMN
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // resume download
    Route::get('/resume', function () {
        $resumePath = public_path('joseph_betbeze_resume.pdf');
        return response()->download($resumePath);
    });
// TODO UPDATE WITH JETSTREAM  & VUE
// Login
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
// Admin Section
    Route::middleware('can:admin')->group(function () {
        Route::get('admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    });
});


