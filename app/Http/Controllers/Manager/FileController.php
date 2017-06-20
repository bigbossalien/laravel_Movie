<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsAddRequest;
use App\Http\Requests\ProductsEditRequest;
use App\Http\Requests\IproductsAddRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;
use App\Models\Products;
use App\Models\Iproducts;
use DateTime;

class FileController extends Controller
{
	public function getFileAdd($id)
	{
		$data = Cate::get() -> toArray();
		$menu =Cate::where('id',$id)->get()->toArray();
		return view('admin.File.add',['dataCate' => $data,'menu'=>$menu,'id'=>$id]);
	}
	public function postFileAdd(ProductsAddRequest $request,$id)
	{
		$file = new Products;
		$file->title 		= $request->title;
		$file->metatitle	=str_slug($request->title,'-');
		$image 				= $request->file('sourceImg');
		if($request->hasFile('sourceImg')){
			$filename 		= time()."-".$image->getClientOriginalName();
			$patch 			= 'Image/AnhBia/images/';
			$image 	->move($patch,$filename);
			$file   ->image = $filename;
		}
		$file->trailer		= $request->trailer;
		$file->author 		= $request->author;
		$file->nhanvat		= $request->nhanvat;
		$file->namsx		= $request->namsx;
		$file->nhasx		= $request->nhasx;
		$file->content 		= $request->content;
		$file->intro  		= $request->intro;
		$file->status 		= $request->status;
		$file->cat_id 		= $request->danhmuc;
		$file->loai_id		= $id;
		$file->user_id		= Auth::user()->id;
		$file->created_at	= new DateTime();
		$file->save();
        return redirect() -> route('getFileList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
	}
	public function getFileEdit($id,$i)
	{
		$cate=Cate::where('parent_id','0')->get()->toArray();
		$parent = Products::findOrFail($id) -> toArray();
		$data = Cate::select('id','name','parent_id') -> get() -> toArray();
		$file = Products::select()->where('id',$id)->get()->toArray();
		return view('admin.File.edit',['parent'=>$parent,'dataCate'=>$data,'file'=>$file,'cate'=>$cate,'id'=>$id,'i'=>$i]);
	}
	public function postFileEdit(ProductsEditRequest $request , $id)
	{
		$file=Products::findOrFail($id);
		$file->title 		= $request->title;
		$file->metatitle	= str_slug($request->title,'-');
		$image 				= $request->file('sourceImg');
		if($request->hasFile('sourceImg')){
			$hinhhientai = $request->hinhhientai;
			$pathImg = "/Image/AnhBia/images/";
			if(file_exists(public_path().$pathImg.$hinhhientai)){
				File::delete(public_path().$pathImg.$hinhhientai);
			}

			$filename 		= time()."-".$image->getClientOriginalName();
			$patch 			= "Image/AnhBia/images/";
			$image 	->move($patch,$filename);
			$file   ->image = $filename;
		}
		$file->author 		= $request->author;
		$file->trailer		= $request->trailer;
		$file->nhanvat		= $request->nhanvat;
		$file->namsx		= $request->namsx;
		$file->nhasx		= $request->nhasx;
		$file->intro 		= $request->intro;
		$file->content 		= $request->content;
		$file->status 		= $request->status;
		if($request->sotap == null){
			$file->sotap   =  $request->sotapcu;
		}else{
			$file->sotap   =  $request->sotap;
		}
		
		$file->cat_id 		= $request->danhmuc;
		$file->user_id		= Auth::user()->id;
		$file->updated_at	= new DateTime();
		$file->save();
        return redirect() -> route('getFileList') -> with(['flash_level' => 'result_msg','flash_message' => 'Sửa thành công !']);
	}
	public function getFileDel($id)
	{
		$file=Products::find($id);
		$pathImg = '/Image/AnhBia/images/';
		if(file_exists(public_path().$pathImg.$file->image)){
			File::delete(public_path().$pathImg.$file->image);
		}
		$file->delete();
		return redirect()->route('getFileList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa thành công !']);
	}
	public function getFileList()
	{
		//$data=Products::with('cate')->get()->toArray();
		$data=DB::table('lrv12_products')
		->join('lrv12_categorys','lrv12_products.cat_id','=','lrv12_categorys.id')
		->join('lrv12_users','lrv12_products.user_id','=','lrv12_users.id')
		->select('lrv12_products.*','lrv12_categorys.id as i','lrv12_categorys.name','lrv12_users.id as idc','lrv12_users.username')
		->get();
		$cate=Cate::where('parent_id','0')->get()->toArray();
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		return view('admin.File.list',['dataList' => $data,'cate'=>$cate]);
	}


	public function getFileItemAdd($id)
	{
		$data=Products::select('id','title')->where('id',$id)->get()->toArray();
		return view('admin.File.additem',['data' => $data]);
	}
	public function postFileItemAdd(IproductsAddRequest $request)
	{
		$itemfile = new Iproducts;
        $itemfile->products_id = $request->taptin;
    	$image = $request -> file('sourceImg');
        if($request->hasFile('sourceImg')){
        	$name = time().'-'.$image -> getClientOriginalName();
        	$patch = "Image/AnhBia/image_prew/";
        	$image 	-> move($patch,$name);
        	$itemfile ->image_prew	= $name;
        }
        $video = $request->file('source');
        if($request->hasFile('source')){
			$videoName           = time().'-'.$video->getClientOriginalName();
			$patch               = 'Files/videos/';
			$video		-> move($patch,$videoName);
			$itemfile 	->source = $videoName;
        }
    	$itemfile->link = $request->link;
		$itemfile->tap        = $request->tap;
		$itemfile->user_id    = Auth::user()->id;
		$itemfile->created_at = new DateTime();
		$itemfile->save();
        return redirect() -> route('getFileItemList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
	}
	public function getFileItemList()
	{
		$cate=Cate::where('parent_id','0')->get()->toArray();
		$data=Iproducts::with('products')->orderBy('products_id')->get()->toArray();
		return view('admin.File.listitem',['data' => $data,'cate'=>$cate]);
	}
	public function getFileItemEdit($id)
	{
		$data=Iproducts::with('products')->where('id',$id)->get()->toArray();
		return view('admin.File.edititem',['data' => $data]);
	}
	public function postFileItemEdit(Request $request,$id)
	{
		$fileitem = Iproducts::findOrFail($id);
		$image = $request->file('sourceImg');
		if($request->hasFile('sourceImg')){
			$ahientai =$request->ahientai;
			$patch='/Image/AnhBia/image_prew/';
			if(file_exists(public_path().$patch.$ahientai)){
				File::delete(public_path().$patch.$ahientai);
			}
			$name=time().'-'.$image->getClientOriginalName();
			$patchnew='Image/AnhBia/image_prew/';
			$image->move($patchnew,$name);
			$fileitem->image_prew=$name;
		}

		$video 				= $request->file('source');
		if($request->hasFile('source')){
			$shientai = $request->shientai;
			$pathV   = '/Files/videos/';
			if(file_exists(public_path().$pathV.$shientai)){
				File::delete(public_path().$pathV.$shientai);
			}

			$videoName 		= time().'-'.$video->getClientOriginalName();
			$patch 			= 'Files/videos/';
			$video 	->move($patch,$videoName);
			$fileitem 	->source 	= $videoName;
		}
		$fileitem->link = $request->link;
		$fileitem->tap         = $request->tap;
		$fileitem->products_id = $request->taptin;
		$fileitem->user_id     = Auth::user()->id;
		$fileitem->updated_at  = new DateTime();
		$fileitem->save();
        return redirect() -> route('getFileItemList') -> with(['flash_level' => 'result_msg','flash_message' => 'Sửa thành công !']);
	}
	public function getFileItemDel($id)
	{
		$fileitem=Iproducts::find($id);
		$pathV   = '/Files/videos/';
		$patchA = '/Image/AnhBia/image_prew/';
		if(file_exists(public_path().$pathV.$fileitem->source)){
			File::delete(public_path().$pathV.$fileitem ->source);
		}
		if(file_exists(public_path().$patchA.$fileitem->image_prew)){
			File::delete(public_path().$patchA.$fileitem->image_prew);
		}
		$fileitem->delete();
		return redirect()->route('getFileItemList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa thành công !']);
	}
	
}
