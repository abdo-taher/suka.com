<?php

namespace App\Http\Requests\Dashbord;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
        return[

            'slug' => 'required|unique:vendors,slug,'.$this -> id,
            'firstName'=> 'required_with:add',
            'lastName' => 'required_with:add',
            'store_name' => 'required|unique:vendors,store_name,'.$this -> id,
            'email' => 'required_with:add|email|unique:vendors,email,'.$this -> id,
            'work_phone' => 'required_with:add|numeric|unique:vendors,home_phone,'.$this -> id,
            'address' => 'required_with:add',
            'category_id' => 'required_with:add|exists:Categories,id',


        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
