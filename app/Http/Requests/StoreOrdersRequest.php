<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdersRequest extends FormRequest
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
            'order_date' => ['required', 'date'],
            'amount' => ['required', 'numeric'],
            'salesman_id' => ['required', 'integer', 'exists:salesman,salesman_id'],
            'customer_id' => ['required', 'integer', 'exists:customers,customer_id'],
            'created_at' => ['required', 'date'],
            'updated_at' => ['nullable']
        ];
    }
}
