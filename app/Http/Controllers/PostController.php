<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
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
        // TODO fix the factory to actually add the published_at dates
        return Inertia::render('Home', [
            'posts' => $posts->only('id', 'title', 'slug', 'excerpt', 'published_at', 'category', 'author'),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
