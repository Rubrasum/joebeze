<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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
    public function index(Request $request): \Inertia\Response
    {

        // Retrieve query parameters
        $search = $request->input('search');
        $category = $request->input('category');

        // ALWAYS included on first visit...
        // OPTIONALLY included on partial reloads...
        // ONLY evaluated when needed...
        $posts = Post::where('created_at', '<=', now('UTC'))
            ->latest('published_at')
            ->filter([
                'search' => $search,
                'category' => $category,
            ])
            ->paginate(8)
            ->withQueryString();

        $categories = Category::all();

        $currentCategory = $request->has('category')
            ? Category::where('slug', $category)->first()
            : null;

        return Inertia::render('Home', [
            'posts' => $posts,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'search' => $search,
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ]);
    }

    public function show(Post $post)
    {
        // ALWAYS included on first visit...
        // OPTIONALLY included on partial reloads...
        // ONLY evaluated when needed...
        $categories = Category::all();

        return Inertia::render('Post', [
            'post' => $post,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'categories' => $categories,
        ]);
    }
}
