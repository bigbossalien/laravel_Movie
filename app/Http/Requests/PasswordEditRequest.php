<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordEditRequest extends Request
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
            'matkhaucu'=>'required',
            'npassword'=>'required|min:6',
            'confirmPass'=>'required|same:npassword',
        ];
    }
    public function messages()
    {
        return [
            'matkhaucu.required' =>"Mật khẩu cũ phải nhập !",
            'npassword.required' =>"Nhập mật khẩu mới !",
            'npassword.min'      =>"Mật khẩu phải phải ít nhất 6 ký tự !",
            'confirmPass.required'=>"Nhập xác nhận mật khẩu !",
            'confirmPass.same'   =>"Xác nhận mật khẩu không chính xác !",
        ];
    }
}
