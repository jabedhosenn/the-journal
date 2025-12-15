<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'min:50', 'max:500'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'author' => ['required', 'string'],
            'read_time' => ['required', 'string', 'max:55'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title cannot exceed 255 characters.',

            'content.string' => 'The content must be a string.',
            'content.min' => 'The content must be at least 50 characters.',
            'content.max' => 'The content cannot exceed 500 characters.',

            'category_id.required' => 'Please select a category.',
            'category_id.integer' => 'The category ID must be an integer.',
            'category_id.exists' => 'The selected category does not exist.',

            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image size cannot exceed 2MB.',

            'author.required' => 'The author field is required.',
            'author.string' => 'The author must be a string.',

            'read_time.required' => 'Please provide the read time.',
            'read_time.string' => 'The read time must be a string.',
            'read_time.max' => 'The read time cannot exceed 55 characters.',

            'published_at.date' => 'The published date must be a valid date.',

            'is_featured.boolean' => 'The featured field must be true or false.',
        ];
    }
}
