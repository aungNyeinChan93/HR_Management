<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            "company_name"=>"required",
            "company_email"=>"required",
            "company_phone"=>"required",
            "company_address"=>"required",
            "contact_person"=>"required",
            "office_start_time"=>"required",
            "office_end_time"=>"required",
            "break_start_time"=>"required",
            "break_end_time"=>"required",
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'company_name.required' => 'The company name is required!!!!.',
            'company_email.required' => 'The company email is required.',
            'company_phone.required' => 'The company phone is required.',
            'company_address.required' => 'The company address is required.',
            'contact_person.required' => 'The contact person is required.',
            'office_start_time.required' => 'The office start time is required.',
            'office_end_time.required' => 'The office end time is required.',
            'break_start_time.required' => 'The break start time is required.',
            'break_end_time.required' => 'The break end time is required.',
        ];
    }

}
