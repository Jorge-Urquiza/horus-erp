<?php

namespace App\Http\Requests\products;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'local_code' => ['required', Rule::unique('products','local_code')->ignore($this->product)],
           // 'minimum_stock' => 'required',
           // 'maximum_stock' => 'required|greater_than_field:minimum_stock',
            'price' => 'required',
            'gain' => 'required|greater_than:0',
            'supplier_id' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'measurements_units_id' => 'required',
         ];
    }

    public function messages()
    {
        return [
            //'minimum_stock.required' => 'El campo stock minimo es obligatorio',
            //'maximum_stock.required' => 'El campo stock maximo es obligatorio',
            //'maximum_stock.greater_than_field' => 'El stock maximo debe ser mayor al stock minimo',
            //'price.greater_than_field' =>  'El precio debe ser mayor al costo',
            'gain.greater_than' => 'La ganancia debe ser mayor a cero',
            'price.required' => 'El campo precio es obligatorio',
            'gain.required' => 'El campo ganancia es obligatorio',
            'name.required' => 'El campo nombre es obligatorio',
            'local_code.required' => 'El campo codigo local es obligatorio',
            'local_code.unique' => 'El codigo local ya existe',          
            'supplier_id.required' => 'El campo proveedor es obligatorio',
            'brand_id.required' => 'El campo marca es obligatorio',
            'category_id.required' => 'El campo categoria es obligatorio',
            'measurements_units_id.required' => 'campo obligatorio',
        ];
    }
}
