<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO fix the factory to actually add the published_at dates
        return view('posts.index', [
            'posts' => Post::where('created_at', '<=', now('UTC'))
                ->latest('published_at')
                ->filter(request(['search', 'category', 'author']))
                ->paginate(8)
                ->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
