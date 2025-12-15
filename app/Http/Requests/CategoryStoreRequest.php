<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'category_description' => ['nullable', 'string', 'min:15', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'The category name is required.',
            'category_name.string' => 'The category name must be a valid string.',
            'category_name.max' => 'The category name may not be greater than 255 characters.',

            'category_description.string' => 'The category description must be a valid string.',
            'category_description.min' => 'The category description must be at least 15 characters.',
            'category_description.max' => 'The category description may not be greater than 500 characters.',

            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image size may not be greater than 2MB.',
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
