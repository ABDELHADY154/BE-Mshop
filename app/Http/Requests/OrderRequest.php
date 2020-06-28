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
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'products' => 'required|array|min:1',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.price' => 'required|numeric',
            'products.*.total' => 'required|numeric',


        ];

        if (!$this->input('client_id')) {
            $rules['client_id'] = 'required|exists:clients,id';
        }


        return $rules;
    }
    public function messages()
    {
        return [


            'client_id.exists' => 'please select client',




        ];
    }
}
