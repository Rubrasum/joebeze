<?php

namespace App\Http\Controllers;

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

    public function store() {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id
        ]));

        return redirect('/admin/posts');
    }

    public function edit(Post $post) {
        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post) {
        $attributes = $this->validatePost($post);


        // Convert the date format
        $formattedDate = Carbon::createFromFormat('Y-m-d', request('published_at'))->format('Y-m-d');

        // Add the formatted date to the attributes array
        $attributes['published_at'] = $formattedDate;

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
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
