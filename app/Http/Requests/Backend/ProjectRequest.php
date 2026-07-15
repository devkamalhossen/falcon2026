<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'service_id' => 'required|integer|exists:services,id',
            'name' => 'required|string|unique:projects,name,' . $this->route('project')?->id,
            'slug' => 'required|string|unique:projects,slug,' . $this->route('project')?->id,
            'motto' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|integer|in:1,2,3',
            'image' => $this->route('project')?->id ? 'nullable|mimes:jpg,png,jpeg,avif,webp|max:10000' : 'required|mimes:jpg,png,jpeg,avif,webp|max:10000',
            'video_id' => 'nullable|string',
            'video' => 'nullable|mimes:mp4|max:200000',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'required|boolean'
        ];
    }
}
