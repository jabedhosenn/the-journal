<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'category_name' => ['required', 'string', 'max:255'],
            'category_description' => ['nullable', 'string', 'min:15', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'The category name is required.',
            'category_name.string' => 'The category name must be a string.',
            'category_name.max' => 'The category name cannot exceed 255 characters.',

            'category_description.string' => 'The category description must be a string.',
            'category_description.min' => 'The category description must be at least 15 characters.',
            'category_description.max' => 'The category description cannot exceed 1000 characters.',

            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image size cannot exceed 2MB.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'category_name' => trim($this->category_name),
            'category_description' => trim($this->category_description),
        ]);
    }
}
