<?php

namespace App\Http\Requests\sales;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            //sale
            'date' => 'required',
            'customer_id' => 'required',
            'nit' => 'nullable',
            'customer_id' => 'required',

            //detail
            'producto_id' => 'required|array|min:1',
            'pcompra' => 'required|array|min:1',
            'cantidad' => 'required',
            'pdescuento' => 'required|array|min:1',

            //calculated fields
            'totales_input' => 'required',
            'discount-neto_input' => 'required',
            'total-neto_input' => 'required',
        ];
    }
}
