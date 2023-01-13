<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'idNumber' => 'required|unique:customers|numeric',
            'fullName' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required|string',
            'address' => 'required|max:255',
            'religion' => 'required',
            'maritalStatus' => 'required',
            'job' => 'required',
            'citizenship' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idNumber.required' => 'ID Number is required!',
            'idNumber.unique' => 'ID Number is already taken!',
            'fullName.required' => 'Full Name is required!',
            'dateOfBirth.required' => 'Date of Birth is required!',
            'gender.required' => 'Gender is required!',
            'address.required' => 'Address is required!',
            'religion.required' => 'Religion is required!',
            'maritalStatus.required' => 'Marital Status is required!',
            'job.required' => 'Job is required!',
            'citizenship.required' => 'Citizenship is required!',
        ];
    }
}
