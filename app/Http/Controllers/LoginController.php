<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserAddRequest;
use App\Models\User;

use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(!Auth::check()){
            return view('admin.Login.login');
        }else{
            if(Auth::user()->level==1){
                $errors=new MessageBag(['errorsAdmin'=>'Bạn không có quyền đăng nhập vào đó']);
                return redirect()->intended('/')->withErrors($errors);
            }
            return redirect()->intended('mv12_admin');
        }
    }

    public function postLogin(LoginRequest $request)
    {
    	$login = 
    	[
    		'email' => $request->email,
    		'password' => $request->password,
            'level' => 0,
    	];
    	if (Auth::attempt($login)) {
            return redirect()->intended('mv12_admin');
        }else{
            $errors = new MessageBag(['errorLogin' => 'Email hoặc mật khẩu không đúng']);
        	return redirect()->back()->withErrors($errors);
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect(\URL::previous());
    }
    public function getdangnhap()
    {
        if (!Auth::check()) {
            return view('fontend.login.dangnhap');
        }else{
            return redirect()->intended('/');
        }
    }
    public function postdangnhap(Request $request)
    {
        $dangnhap = 
        [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1,
        ];
        if (Auth::attempt($dangnhap,$request->has('remember'))) {
            return redirect()->intended('/');
        }else{
            $errors = new MessageBag(['loi-dang-nhap' => 'Email hoặc mật khẩu không đúng']);
            return redirect()->back()->withErrors($errors);
        }
    }
    public function getdangky()
    {
        return view('fontend.login.dangky');
    }
    public function postdangky(UserAddRequest $request)
    {
        $user = new User;
        $user->username =$request->username;
        $user->hoten    =$request->hoten;
        $user->email    =$request->email;
        $user->password =bcrypt($request->password);
        $user->matkhau  =$request->password;
        $user->save();
        return redirect()->route('getdangnhap')->with(['flash_level'=>'result_msg','flash_message'=>'Đăng ký thành công !']);
    }
}
