<?php

namespace App\Http\Requests\branchOffices;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateBranchOfficeRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|unique:branch_offices,name,' . $this->name,
            'address' => 'required',
            'city' => 'required',
            'telephone' => 'required'
        ];
    }
}
