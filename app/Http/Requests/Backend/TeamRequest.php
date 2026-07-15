<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'team_type_id' => 'required|integer|exists:team_types,id',
            'name' => 'required|string|max:255',
            'designation' =>  'required|string|max:255',
            'bio' =>  'required|string',
            'educational_bg' => 'nullable|string|max:255',
            // 'is_director' =>  'required|string|max:255',
            'image' =>  $this->route('team')?->id ? 'nullable|mimes:png,jpg,jpeg,avif,webp|max:10000' : 'required|mimes:png,jpg,jpeg,avif,webp|max:10000',
            'is_active' =>  'required|boolean',
        ];
    }
}
