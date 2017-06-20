<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
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
            'birthday' => 'date|date_format:Y-m-d',
            'avata' => 'mimes:jpeg,bmp,png,jpg,jpe,ico',
        ];
    }
    public function messages()
    {
        return [
            'birthday.date' => 'Bạn phải nhập kiểu date',
            'birthday.date_format' => 'Ngày Sinh phải có dạng mm/dd/yyyy',
            'avata.mimes'   => 'Bạn Nhập không đúng định dạng ',
        ];
    }
}
