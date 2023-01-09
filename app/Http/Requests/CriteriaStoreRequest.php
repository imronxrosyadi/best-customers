<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriteriaStoreRequest extends FormRequest
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
            'code' => 'required|unique:criterias',
            'name' => 'required|string',
            'weight' => 'required|numeric',
            'type' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Criteria Code is required!',
            'code.unique' => 'Criteria Code is already taken!',
            'name.required' => 'Criteria Name is required!',
            'weight.required' => 'Weight is required!',
            'type.required' => 'Type is required!'
        ];
    }
}
