<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingInformationRequest extends FormRequest
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
            'site_name' => 'required|string|max:255',
            'site_logo' => 'nullable|mimes:png,jpg,jpeg,webp|max:10000',
            'favicon' => 'nullable|mimes:png,jpg,jpeg,webp|max:10000',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'hotline' => 'nullable|string',
            'quick_contact' => 'nullable|string',
            'address' => 'nullable|string',
            'copyright_text' => 'nullable|string|max:255',
            'google_map_location' => 'nullable|string|max:1024',
            'site_banner_title' => 'nullable|string',
            'site_banner_sub_title' => 'nullable|string',
            'home_feature_video' => 'nullable|file|mimes:mp4,mkv|max:200000',
        ];
    }
}
