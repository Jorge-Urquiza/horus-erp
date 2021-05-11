<?php

namespace App\Http\Requests\transfers;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferRequest extends FormRequest
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
            'branch_office_origin_id' => 'required',
            'branch_office_destiny_id' => 'required',
            'producto_id' => 'required',
         ];
    }

    public function messages()
    {
        return [
            'branch_office_origin_id.required' => 'El campo sucursal origen es obligatorio',
            'branch_office_destiny_id.required' => 'El campo sucursal destino es obligatorio',
            'producto_id.required' => 'Debe Ingresar Productos',
        ];
    }
}
