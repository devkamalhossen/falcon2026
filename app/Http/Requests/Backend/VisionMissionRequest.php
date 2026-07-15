<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VisionMissionRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required|integer|in:1,2',
            'short_description' => 'required|string|max:1024',
            'image' =>  'nullable|mimes:jpg,png,jpeg,avif,webp|max:10000',
            'is_active' => 'required|boolean'
        ];
    }
}
