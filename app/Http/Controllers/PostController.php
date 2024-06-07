<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Application;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $posts = Post::where('created_at', '<=', now('UTC'))
            ->latest('published_at')
            ->filter(request(['search', 'category', 'author']))
            ->paginate(8)
            ->withQueryString();

        // TODO add a filter here or option to turn off categories
        $categories = Category::all();
        // TODO fix the factory to actually add the published_at dates

        $category = null;
        // Check for currentCategory in the request get
        if (request()->has('currentCategory')) {
            $category = Category::where('name', request('currentCategory'))->first();
        }

        return Inertia::render('Home', [
            'posts' => $posts->only('id', 'title', 'slug', 'excerpt', 'published_at', 'category', 'author'),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'categories' => $categories->only('id', 'name'),
            'currentCategory' => $category,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
