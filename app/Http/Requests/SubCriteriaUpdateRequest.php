<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaUpdateRequest extends FormRequest
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
            'name' => 'required',
            'value' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'SubCriteria Name is required!',
            'value.required' => 'Value is required!',
            'value.numeric' => 'Value is Numeric!',
        ];
    }
}
