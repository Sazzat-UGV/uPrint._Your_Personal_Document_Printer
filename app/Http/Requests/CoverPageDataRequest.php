<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverPageDataRequest extends FormRequest
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
            "department_name" =>'required|numeric',
            "semester_name" =>'required|numeric',
            "subject_name" =>'required|numeric',
            "teacher_name" =>'required|numeric',
            "assignment_topics" =>'nullable|string|max:100',
            "submission_date" =>'required|date'
        ];
    }
}
