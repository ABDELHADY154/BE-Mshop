<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            // 'product_id[]' => 'required',
            // 'quantity[]' => 'required',
            'client_id' => 'required',


        ];



        return $rules;
    }
    public function messages()
    {
        return [

            // 'product_id[].required' => 'please select a product',
            // 'quantity[].required' => 'quantity is required',
            'client_id.required' => 'please select client',




        ];
    }
}
