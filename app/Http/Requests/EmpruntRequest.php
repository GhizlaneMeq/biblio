<?php

namespace App\Http\Requests;

use App\Rules\CheckBookAvailableCopies;
use Illuminate\Foundation\Http\FormRequest;

class EmpruntRequest extends FormRequest
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
            'description' => 'nullable|string',
            'date_emprunt' => 'required|date',
            'return_date' => 'nullable|date',
            'is_returned' => 'nullable|boolean',
            'user_id' => 'required|exists:users,id',
            'book_id' => ['required', new CheckBookAvailableCopies()]
        ];
    }
}
