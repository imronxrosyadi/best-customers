<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerEvaluationUpdateRequest extends FormRequest
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
            'customer_id' => 'required',
            'subcriterias' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'Customer is required!',
            'subcriterias.required' => 'Subcriteria is required!',
            'subcriterias.array' => 'Subcriteria is required!',
        ];
    }
}
