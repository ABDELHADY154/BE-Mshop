<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            // 'image' => 'required|image|max:2048'

        ];


        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Required Name',
            'email.required' => 'Required Email',
            'phone_number.required' => 'Required Phone number',

        ];
    }
}
