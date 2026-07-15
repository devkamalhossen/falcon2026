<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'role_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => ['required', 'unique:admins' . ($this->user ? ',email,' . $this->user['id'] : '')],
            'number' => 'nullable|string',
            'image' => ['nullable', 'mimes:jpg,png,jpeg,webp'],
            'password' => [($this->user ? 'nullable' : 'required'), 'min:8', 'same:password_confirmation'],
            'password_confirmation' => [($this->user ? 'nullable' : 'required'), 'min:8'],
            'is_active' => 'required|boolean',
        ];
    }
}
