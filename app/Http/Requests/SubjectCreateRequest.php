<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectCreateRequest extends FormRequest
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
            'semester_id'=>'required|numeric',
            'department_id'=>'required|numeric',
            'subject_name'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'subject_code'=>'required|string|max:50',
        ];
    }
}
