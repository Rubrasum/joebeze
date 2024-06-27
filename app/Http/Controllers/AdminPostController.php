<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AdminPostController extends Controller
{
    public function index()
    {
//        return view('admin.posts.index', [
//            'posts' => Post::latest('published_at')
//                ->paginate(25)
//                ->withQueryString()
//        ]);

        // Inertia version
        $posts = Post::latest('published_at')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Admin/Posts/Index', [
            'posts' => $posts
        ]);
    }

    public function create() {
        // Get categories for dropdown
        $categories = Category::all();

        return Inertia::render('Admin/Posts/Create', [
            'categories' => $categories
        ]);
    }

    public function store(StorePostRequest $request) {
        $validated = $request->validated();

        // get user id
        $validated['user_id'] = auth()->id();

        // Store the blog post
        $post = Post::create($validated);

        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
        ]);
    }

    public function show(Post $post) {
        // Get categories for dropdown
        $categories = Category::all();
        return Inertia::render('Admin/Posts/View', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function edit(Post $post) {
        // Get categories for dropdown
        $categories = Category::all();

        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post) {
        $data = $request->validated();

        $post->update($data);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post) {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
