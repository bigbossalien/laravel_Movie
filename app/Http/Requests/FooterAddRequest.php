<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FooterAddRequest extends Request
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
            'gioithieu'=>'required',
            'lhqc'=>'required',
            'dksd'=>'required',
            'csrt'=>'required',
            'facebook'=>'required',
        ];
    }
    public function messages()
    {
       return [
            'gioithieu.required' => 'Giới thiệu không được để trống !',
            'lhqc.required' => 'Chính Sách Quảng Cáo không được để trống !',
            'dksd.required' => 'Điều Khoản Sử Dụng không được để trống !',
            'csrt.required' => 'Chính Sách Riêng Tư không được để trống !',
            'facebook.required' => "Fanpage không được để trống !",
       ];
    }
}
