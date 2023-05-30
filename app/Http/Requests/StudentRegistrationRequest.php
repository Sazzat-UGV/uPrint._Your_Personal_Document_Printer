<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'student_Id'=>'required|numeric|digits_between:4,12',
            'phone'=>'required|numeric|digits:11',
            'password'=>'required|string|confirmed|min:6',
            'semester_id'=>'required|numeric',
            'department_id'=>'required|numeric',
        ];
    }
}
