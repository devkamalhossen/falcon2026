<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GoogleReviewRequest extends FormRequest
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
            'name' => 'required|string',
            'image' =>  'nullable|mimes:jpg,png,jpeg,avif,webp|max:10000',
            'review' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'review_date' => 'nullable|date',
            'is_active' => 'required|boolean',
        ];
    }
}
