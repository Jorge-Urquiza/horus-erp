<?php

namespace App\Http\Requests\branchproducts;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchsProductsRequest extends FormRequest
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
            'minimum_stock' => 'required',
            'maximum_stock' => 'required|greater_than_field:minimum_stock',
         ];
    }

    public function messages()
    {
        return [
            'minimum_stock.required' => 'El campo stock minimo es obligatorio',
            'maximum_stock.required' => 'El campo stock maximo es obligatorio',
            'maximum_stock.greater_than_field' => 'El stock maximo debe ser mayor al stock minimo',
        ];
    }
}
