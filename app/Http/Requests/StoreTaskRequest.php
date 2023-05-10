<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        $rules =  [
            'title'              => 'required',
            'frequency'          => 'required',
            'start_date'         => 'required',
            'end_date'           => 'required',
            'occurrence'        => 'numeric|nullable|between:1,31'
        ];

        if ($this->input('frequency') == 'weekly') {
            $rules['days'] = ['required','array'];
        }

        return $rules;
    }
    // public function messages()
    // {
    //     return [
    //         'occurrence.gt' => 'Occurrence must be greater then 0',
    //         'occurrence.lt' => 'The Sign out must be a time after Sign in.',
    //     ];
    // }
}
