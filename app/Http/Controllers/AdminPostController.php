<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
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
        return view('admin.posts.create');
    }

    public function store(Post $post) {
        $attributes = $this->validatePost($post);

        $post->create($attributes);

        return back()->with('success', 'Post Created!');
    }

    public function edit(Post $post) {
        // Get categories for dropdown
        $categories = Category::all();

        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Post $post) {
        $categories = Category::all();
        $attributes = $this->validatePost($post);

        $post->update($attributes);

        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function destroy(Post $post) {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null) {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => 'required',
        ]);
    }
}
