<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesmanRequest extends FormRequest
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
            'salesman_name' => ['required', 'string', 'max:255', 'unique:salesman,salesman_name'],
            'salesman_city' => ['required', 'string', 'max:255'],
            'commission' => ['required', 'numeric'],
            'created_at' => ['required', 'date'],
            'updated_at' => ['nullable']
        ];
    }
}
