<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',      // Validate that user_id exists in the users table
            'title' => 'required|string|max:255',         // Title is required, must be a string and max length of 255
            'amount' => 'required|numeric|min:0',         // Amount is required, must be numeric and at least 0
        ];
    }
}
