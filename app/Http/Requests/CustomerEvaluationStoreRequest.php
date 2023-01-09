<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerEvaluationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|unique:customers_evaluations',
            'subcriteria' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'Customer is required!',
            'customer_id.unique' => 'Customer is already taken!',
            'subcriteria.required' => 'Subcriteria is required!',
            'subcriteria.array' => 'Subcriteria is required!',
        ];
    }
}
