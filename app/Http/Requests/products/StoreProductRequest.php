<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'local_code' => 'required',
            'price' => 'required',
            'supplier_id' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'measurements_units_id' => 'required',
         ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'local_code.required' => 'El campo codigo local es obligatorio',
            'price.required' => 'El campo precio es obligatorio',
            'supplier_id.required' => 'El campo proveedor es obligatorio',
            'brand_id.required' => 'El campo marca es obligatorio',
            'category_id.required' => 'El campo categoria es obligatorio',
            'measurements_units_id.required' => 'campo obligatorio',
        ];
    }
}
