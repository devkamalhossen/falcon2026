<?php

namespace App\Http\Requests\Backend\Home;

use Illuminate\Foundation\Http\FormRequest;

class HomeBannerRequest extends FormRequest
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
            'image' => $this->route('banner') && $this->route('banner')->id ? 'nullable|mimes:jpg,png,jpeg,webp|max:10000' : 'required|mimes:jpg,png,jpeg,webp|max:10000',
            'alt_name' => 'nullable|string|max:255',
            'is_active' => 'required|boolean'
        ];
    }
}
