<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DateTime;

class UserController extends Controller
{
    public function getUserAdd()
    {
    	return view('admin.User.add');
    }
    public function postUserAdd(UserAddRequest $request)
    {
		$user             = new User;
		$user->username   = $request->username;
		$user->email      = $request->email;
		$user->password   = bcrypt($request->password);
        $user->matkhau    = $request->password;
		$user->sex        = $request->sex;
		$user->level      = $request->level;
		$user->created_at = new DateTime();
        $user->save();
        return redirect() -> route('getUserList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
    }
    public function getUserList()
    {
    	$data = User::select('id','username','email','level') -> get() -> toArray();
    	return view('admin.User.list',['dataUser' => $data]);
    }
    public function getUserDel($id)
    {
    		$user=User::find($id);
    	if((Auth::user() ->id != $id && $id == 1) || Auth::user() ->id == $id || $user['level'] ==0 ){
    		return redirect() -> route('getUserList') -> with(['flash_level' => 'result_msg','flash_message' => 'Bạn không được phép xoá !']);
    	}else{
	    	$user->delete($id);
	    	return redirect() -> route('getUserList') -> with(['flash_level' => 'result_msg','flash_message' => 'Xóa thành công !']);
    	}
    	
    }
    public function getUserEdit($id)
    {
    	$data1 = User::findOrFail($id) -> toArray();
    	$data = User::select('id','username','email','level','birthday','sex') -> where('id',$id) -> get() -> toArray();
    	if(Auth::user()->id != 1 && ($id==1 || ($data1['level']==0 && Auth::user()->id != $id))) {
    		return redirect() -> route('getUserList') -> with(['flash_level' => 'result_msg','flash_message' => 'Bạn không được phép sửa !']);
    	}
    		return view('admin.User.edit',['dataUser' => $data,'data' => $data1]);
    	
    }
    public function postUserEdit(Request $request , $id)
    {
    	$user = User::find($id);
        if($request ->password){
            $user->password   = bcrypt($request->password); 
        }
        $user->level    = $request->level;
        $user->birthday = $request->birthday;
        $user->sex      =$request->sex;
		$user->updated_at = new DateTime();
		$user->save();
		return redirect() -> route('getUserList') -> with(['flash_level' => 'result_msg','flash_message' => 'Sửa thành công !']);
    }
}