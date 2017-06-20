<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserAddRequest extends Request
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
            'username' => 'required|unique:lrv12_users,username',
            'email' => 'required|unique:lrv12_users,email',
            'hoten' =>  'required',
            'password' => 'required',
            'confirmPass' => 'same:password'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => "Tên hiển thị không được để trống !",
            'username.unique' => "Tên hiển thị này đã tồn tại !",
            'email.required' => "Email không được để trống !",
            'email.unique' => "Email này đã tồn tại !",
            'hoten.required'    => 'Yêu cầu bạn nhập họ tên !',
            'password.required' => "Mật khẩu không được để trống !", 
            'confirmPass.same' => "Xác nhận mật khẩu không đúng",
        ];
    }
}
