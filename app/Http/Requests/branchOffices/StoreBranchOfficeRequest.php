<?php

namespace App\Http\Requests\branchOffices;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchOfficeRequest extends FormRequest
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
            'name' => 'required|unique:branch_offices',
            'address' => 'required',
            'city' => 'required',
            'telephone' => 'required'
        ];
    }
}
