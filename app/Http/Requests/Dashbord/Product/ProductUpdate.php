<?php

namespace App\Http\Requests\Dashbord\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
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
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'category_id'=>'exists:categories,id',
                'image'=>'nullable',
                'quantity'=>'required|integer|min:1',
                'colors'=>'nullable|array',
                'colors.*'=>'nullable|string',
                'sizes'=>'nullable|array',
                'sizes.*'=>'nullable|string',
            ];

    }
}
