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
        $author = $request->input('author');


        $posts = Post::where('created_at', '<=', now('UTC'))
            ->latest('published_at')
            ->filter([
                'search' => $search,
                'category' => $category,
                'author' => $author,
            ])
            ->paginate(8)
            ->withQueryString();

        // TODO add a filter here or option to turn off categories
        $categories = Category::all();
        // TODO fix the factory to actually add the published_at dates
        // Check for currentCategory in the request get
        if (request()->has('category')) {
            $category = Category::where('slug', $category)->first();
        }


        return Inertia::render('Home', [
            'posts' => $posts,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'categories' => $categories,
            'currentCategory' => $category,
        ]);
    }

    public function show(Post $post)
    {
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
