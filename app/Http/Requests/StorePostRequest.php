<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //just do jetstream auth for now
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:200',
            'slug' => 'required|max:50|unique:posts,slug',
            'excerpt' => 'required|min:5|max:2000',
            'body' => 'required|min:5|max:5000',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'required|date',
        ];
    }
}
