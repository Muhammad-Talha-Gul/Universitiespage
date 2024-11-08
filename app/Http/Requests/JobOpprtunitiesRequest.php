<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobOpprtunitiesRequest extends FormRequest
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
            'title' => 'required',
            'job_type' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'site_based' => 'required',
            'requirements' => 'required',
            'responsibilities' => 'required',
            'description' => 'required',
            'experience' => 'required',

        ];
    }
}
