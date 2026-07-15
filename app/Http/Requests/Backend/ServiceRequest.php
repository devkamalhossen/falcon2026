<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'image' => $this->route('service')?->id ? 'nullable|mimes:jpg,png,jpeg,avif,webp|max:10000' : 'required|mimes:jpg,png,jpeg,avif,webp|max:10000',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv,mkv,flv|max:200000',
            'service_category_id' => 'required|integer|exists:service_categories,id',
            'slug' => 'required|string|unique:services,slug,'.$this->route('service')?->id,
            'title' => 'required|string|unique:services,title,'.$this->route('service')?->id,
            'description' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_scripts' => 'nullable|string',
            'is_active' => 'required|boolean'
        ];
    }
}
