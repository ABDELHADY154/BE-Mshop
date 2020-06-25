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
            // 'quantity[]' => 'required',


        ];
        // if (!$this->input('product_id[]')) {
        //     $rules['product_id[]'] = 'exists:order_details,product_id';
        // }
        if (!$this->input('client_id')) {
            $rules['client_id'] = 'exists:orders,client_id';
        }


        return $rules;
    }
    public function messages()
    {
        return [

            // 'product_id[].exists' => 'please select a product',
            // 'quantity[].required' => 'quantity is required',
            'client_id.exists' => 'please select client',




        ];
    }
}
