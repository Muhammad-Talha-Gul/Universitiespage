<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyOnlineRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'student_name' => 'required|string',
            'student_email' => 'required|email',
            'student_phone_number' => 'required|string',
            'student_last_education' => 'required|string',
            'student_country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'student_apply_for' => 'required|string',
        ];
    }
}
