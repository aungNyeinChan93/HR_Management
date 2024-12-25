<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;


class UpdateEmployeeRequest extends FormRequest
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
            'name'=>['required'],
            'email'=>['required','email','unique:users,email,'.$this->route('employee'), ],
            'phone'=>['required','min:5','max:15'],
            'employee_id'=>['required'],
            'nrc_number'=>['required'],
            'address'=>['required'],
            'birthday'=>['required'],
            'date_of_join'=>['required'],
            'gender'=>['required'],
            'department_id'=>['required'],
            'password'=>['required',Password::default()]

        ];
    }
}
