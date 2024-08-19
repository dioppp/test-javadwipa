<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomersRequest extends FormRequest
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
            'customer_id' => ['required', 'integer', 'exists:customers,customer_id'],
            'customer_name' => ['required', 'string', 'max:255', 'unique:customers,customer_name,' . $this->customer_id . ',customer_id'],
            'customer_city' => ['required', 'string', 'max:255'],
            'updated_at' => ['required', 'date']
        ];
    }
}
