<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\CateEditRequest;
use App\Models\Cate;
use DateTime;

class CateController extends Controller
{
    public function getCateAdd()
    {
        $data = Cate::select('id','name','parent_id') -> get() -> toArray();
    	return view('admin.Category.add',['dataCate' => $data]);
    }
    public function postCateAdd(CateAddRequest $request)
    {
		$cate             = new cate;
		$cate->name       = $request->name;
		$cate->metatitle  = str_slug($request->name,"-");
		$cate->parent_id  = $request->parent;
		$cate->created_at = new DateTime();
		$cate->save();
		return redirect() -> route('getCateList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
    }
    public function getCateList()
    {
        $data = Cate::select('id','name','parent_id') -> orderBy('id','asc') -> get() -> toArray();
    	return view('admin.Category.list',['listCate' => $data]); 
    }
    public function getCateDel($id)
    {
        //dem so phan tu co parent_id == id chuyen vao
        $parent = Cate::where('parent_id',$id)->count();
        if($parent == 0){
            $cate = Cate::find($id);
            $cate->delete($id);
            return redirect() -> route('getCateList') -> with(['flash_level' => 'result_msg','flash_message' => 'Xóa thành công !']);
        }else{
            echo "  <script>
                        alert('Bạn không được phép xóa danh mục này !');
                        window.location = '";
                            echo route('getCateList');
                        echo "';
                    </script>";
        }
    }
    public function getCateEdit($id)
    {
        $parent = Cate::findOrFail($id) -> toArray();
        $data = Cate::select('id','name','parent_id') -> get() -> toArray();
        return view('admin.Category.edit',['data' => $data , 'parent' => $parent]);
    }
    public function postCateEdit(CateEditRequest $request,$id)
    {
        $cate = Cate::find($id);
        $cate->name       = $request->name;
        $cate->metatitle  = str_slug($request->name,"-");
        $cate->updated_at = new DateTime();
        $cate->save();
        return redirect() -> route('getCateList') -> with(['flash_level' => 'result_msg','flash_message' => 'Sửa thành công !']);
    }
}
