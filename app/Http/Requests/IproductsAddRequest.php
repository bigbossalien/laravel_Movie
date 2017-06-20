<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IproductsAddRequest extends Request
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
            'tap'       =>  'required',
            'link'      => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            
        ];
    }
    public function messages()
    {
        return [
            'tap.required'       => 'Tập không được để trống !',
            'link.regex'           => "Bạn phải nhập định dạng của 1 link !",
            
        ];
    }
}
