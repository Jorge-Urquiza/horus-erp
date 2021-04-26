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
            'date' => 'required',
            'customer_id' => 'required',
            'nit' => 'nullable',
            'cantidad' => 'required',
            'customer_id' => 'required',
            'producto_id' => 'required|array|min:1',
            'pcompra' => 'required|array|min:1',
            'pdescuento' => 'required|array|min:1',
        ];
    }
}
