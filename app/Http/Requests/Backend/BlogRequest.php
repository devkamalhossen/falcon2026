<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:blogs,title,' . $this->route('blog')?->id,
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $this->route('blog')?->id,
            'blog_category_id' => 'required|integer|exists:blog_categories,id',
            'image' => $this->route('blog')?->id ? 'nullable|mimes:jpg,png,jpeg,avif,webp|max:10000' : 'required|mimes:jpg,png,jpeg,avif,webp|max:10000',
            'blog_excerpt' => 'nullable|string|max:2000',
            'post_content' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'required|boolean'
        ];
    }
}
