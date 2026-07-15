<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_category_id' => 'required|integer|exists:product_categories,id',
            'name' => 'required|string|unique:products,name,' . $this->route('product')?->id,
            'datasheet' => 'nullable|mimes:pdf|max:20000',
            'is_active' => 'required|boolean'
        ];
    }
}
