<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required',
            'quantity' => 'required',
            // 'image' => 'required|image|max:2048'

        ];

        if (!$this->input('category_id')) {
            $rules['category_id'] = 'exists:products,category_id';
        }
        if (!$this->input('user_id')) {
            $rules['user_id'] = 'exists:products,user_id';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'category_id.exists' => 'Invalid Category',
            'user_id.exists' => 'Invalid user',
            'name.required' => 'Required Name',
            'price.required' => 'Required Price',
            'quantity.required' => 'Required quantity',
            // 'image.required' => 'cant upload this image',



        ];
    }
}
