<?php

namespace App\View\Components\Categories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{

    public mixed $post;

    public function __construct(Post $post = null)
    {
        $this->post = $post;
    }

    public function render(): View
    {
        $originalCategory = request()->has('category') ? Category::firstWhere('slug', request('category')) : null;

        $currentCategory = $this->post ? Category::firstWhere('id', $this->post->category->id) : $originalCategory;

        return view('components.categories.dropdown', [
            'categories' => Category::all(),
            'currentCategory' => $currentCategory
        ]);
    }
}
