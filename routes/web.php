<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
        Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
        Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
        Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
        Route::get('admin/posts/{post:id}', [AdminPostController::class, 'show'])->name('admin.posts.show');
        Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::post('admin/posts/', [AdminPostController::class, 'store'])->name('admin.posts.store');
    });
});


