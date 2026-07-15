<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
            'image' => $this->route('importer') && $this->route('importer')->id ? 'nullable|mimes:jpg,png,jpeg,webp|max:10000' : 'required|mimes:jpg,png,jpeg,webp|max:10000',
            'name' => 'nullable|string|max:255',
            'type' => 'required|integer|in:1,2,3',
            'is_active' => 'required|boolean',
        ];
    }
}
