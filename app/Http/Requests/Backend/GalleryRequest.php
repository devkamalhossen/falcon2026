<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'category_id' => 'required|integer|exists:gallery_categories,id',
            'type' => 'required|integer|in:1,2',
            'image' => [
                $this->route('gallery')?->id ? 'nullable' : 'required_if:type,1',
                'mimes:jpg,png,jpeg,webp',
                'max:10000',
            ],
            'video_id' => 'required_if:type,2',
            'alt_name' => 'nullable|string',
            'is_active' => 'required|boolean',
        ];
    }
}
