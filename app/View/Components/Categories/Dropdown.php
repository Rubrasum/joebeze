<?php

namespace App\View\Components\Categories;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public function render(): View
    {
        return view('components.categories.dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
