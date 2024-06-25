<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // TODO Update the rules on the frontend
        return [
            'title' => 'required|max:200',
            'slug' => 'required|max:50|unique:posts,slug,' . $this->post->id,
            'excerpt' => 'required|min:5|max:2000',
            'body' => 'required|min:5|max:5000',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'required|date',
        ];
    }
}
