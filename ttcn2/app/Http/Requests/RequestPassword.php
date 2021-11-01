<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
    public function rules()
    {
        return [
            'mkcu' => 'required',
            'mkmoi1' => 'required',
            'mkmoi2' => 'required',            
        ];
    }
    public function messages()
    {
        return [
            'mkcu.required' => 'Trường này không được để trống',
            'mkmoi1.required' => 'Trường này không được để trống',
            'mkmoi2.required' => 'Trường này không được để trống',
            
        ];
    }
}
