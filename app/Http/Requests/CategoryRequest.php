<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        // Define the basic validation rules for the 'category' and 'image' fields.
        $rules = [
            'category' => ['required', 'string', 'unique:categories,category', 'max:100'],
            'image' => ['image', 'max:2000']
        ];

        // If the request method is 'PUT' (updating a category), modify validation rules accordingly.
        if ($this->method() === 'PUT') {
            $categoryId = $this->route('category');

            // Modify 'category' rule to allow unique validation, ignoring the current category ID.
            $rules['category'] = 'sometimes|string|' . Rule::unique('categories')->ignore($categoryId);

            $rules['image'] = 'image|max:2000';
        }

        // Return the applicable validation rules.
        return $rules;
    }

    // Creates custom validation messages
    public function messages(): array
    {
        return [
            'image.max' => 'File too large. The image must not be greater than 2MB'
        ];
    }
}
