<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'idNumber' => 'required|digits:16|numeric',
            'fullName' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required|string',
            'address' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'idNumber.required' => 'ID Number is required!',
            'fullName.required' => 'Full Name is required!',
            'dateOfBirth.required' => 'Date of Birth is required!',
            'gender.required' => 'Gender is required!',
            'address.required' => 'Address is required!'
        ];
    }
}
