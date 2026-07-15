<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactQueryRequest extends FormRequest
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
            'service_id' => 'nullable|integer|exists:services,id',
            'project_id' => 'nullable|integer|exists:projects,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:50',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1024',
        ];
    }
}
