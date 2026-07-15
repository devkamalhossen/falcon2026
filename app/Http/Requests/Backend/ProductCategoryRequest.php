<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'image' => $this->route('product_category')?->id ? 'nullable|mimes:jpg,png,jpeg,avif,webp|max:10000' : 'required|mimes:jpg,png,jpeg,avif,webp|max:10000',
            'name' => $this->route('product_category')?->id ? 'required|string' : 'required|string|unique:product_categories,id',
            'is_active' => 'required|boolean'
        ];
    }
}
