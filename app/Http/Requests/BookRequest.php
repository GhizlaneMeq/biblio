<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'description' => 'nullable|string',
            'deleted' => 'boolean',
            'publication_year' => 'nullable|date',
            'total_copies' => 'nullable|integer',
            'available_copies' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title must not exceed 255 characters.',
            'author.required' => 'The author field is required.',
            'author.max' => 'The author must not exceed 255 characters.',
            'genre.required' => 'The genre field is required.',
            'genre.max' => 'The genre must not exceed 255 characters.',
            'description.string' => 'The description must be a string.',
            'deleted.boolean' => 'The deleted field must be a boolean value.',
            'publication_year.date' => 'The publication year must be a valid date.',
            'total_copies.integer' => 'The total copies must be an integer.',
            'available_copies.integer' => 'The available copies must be an integer.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image must not be larger than 2048 kilobytes.',
        ];
    }
}
