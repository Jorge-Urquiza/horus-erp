<?php

namespace App\Http\Requests\incomes;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeRequest extends FormRequest
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
            'branch_office_id' => 'required',
            'producto_id' => 'required',
         ];
    }

    public function messages()
    {
        return [
            'branch_office_id.required' => 'El campo sucursal es obligatorio',
            'producto_id.required' => 'Debe Ingresar Productos',
        ];
    }
}
