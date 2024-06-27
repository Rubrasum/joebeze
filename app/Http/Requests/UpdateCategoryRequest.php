<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     *  @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:250|unique:categories,name,' . $this->category->id,
            'slug' => 'required|max:250|unique:categories,slug,' . $this->category->id,
            'color' => 'required|max:50|unique:categories,color,' . $this->category->id,
        ];
    }
}