<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideAddRequest;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewsEditRequest;
use App\Http\Requests\FooterAddRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Slide;
use App\Models\News;
use App\Models\Footer;
use App\Models\Errors;
use DateTime;

class ManagerController extends Controller
{
    public function getMana() 
    {
        return view('admin.Manager.mana');
    }
    public function getAddSlide()
    {
        return view('admin.Manager.addSlide');
    }
    public function postAddSlide(SlideAddRequest $request)
    {
        $slide = new Slide;
        $image              = $request->file('sourceImg');
        if($request->hasFile('sourceImg')){
            $filename       = time()."-".$image->getClientOriginalName();
            $patch          = 'Image/Slide/';
            $image  ->move($patch,$filename);
            $slide   ->image = $filename;
        }
        $slide->title = $request->title;
        $slide->metatitle = str_slug($request->title,'-');
        $slide->user_id = Auth::user()->id;
        $slide->created_at = new DateTime();
        $slide->save();
        return redirect() -> route('getSlideList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
    }
    public function getEditSlide($id) 
    {
        $data =Slide::where('id',$id)->get()->toArray();
        return view('admin.Manager.editSlide',['data' => $data]);
    }
    public function postEditSlide(Request $request ,$id)
    {
        $slide = Slide::findOrFail($id);
        $slide->title=$request->title;
        $slide->metatitle=str_slug($request->title,'-');
        $image  = $request->file('sourceImg');
        if($request->hasFile('sourceImg')){
            $name=$request->hinhhientai;
            $patch='/Image/Slide/';
            if(file_exists(public_path().$patch.$name)){
                File::delete(public_path().$patch.$name);
            }
        $new_name=time().'-'.$image->getClientOriginalName();
        $new_patch='Image/Slide/';
        $image ->move($new_patch,$new_name);
        $slide ->image=$new_name;
        $slide->user_id=Auth::user()->id;
        $slide->updated_at=new DateTime();
        $slide->save();
        return redirect() -> route('getSlideList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
        }
    }
    public function getDelSlide($id)
    {
        $slide=Slide::find($id);
        $patch='/Image/Slide/';
        if(file_exists(public_path().$patch.$slide->image)){
            File::delete(public_path().$patch.$slide->image);
        }
        $slide->delete();
        return redirect()->route('getSlideList')->with(['flash_level' => 'result_msg','flash_message' => 'Xóa thành công !']);
    }
    public function getSlideList()
    {
        $data = Slide::get()->toArray();
        return view('admin.Manager.listSlide',['data' => $data]);
    }
    public function getNewsAdd(){
        return view('admin.Manager.addNews');
    }
    public function postNewsAdd(NewsAddRequest $request){
        $news= new News;
        $news->title = $request->title;
        $news->metatitle = str_slug($request->title,'-');
        $img             = $request->file('sourceImg');
        if($request->hasFile('sourceImg')){
        $name        =time().'-'.$img->getClientOriginalName();
        $patch       ='Image/News/';
        $img ->move($patch,$name);
        $news->image = $name;
        }
        $news->status = $request->status;
        $news->intro = $request->intro;
        $news->content = $request->content;
        $news->user_id=Auth::user()->id;
        $news->created_at=new DateTime();
        $news->save();
        return redirect() -> route('getNewsList') -> with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
    }
    public function getNewsList(){
        $data=News::get()->toArray();
        return view('admin.Manager.listNews',['data'=>$data]);
    }
    public function getNewsEdit($id){
        $data=News::where('id',$id)->get()->toArray();
        return view('admin.Manager.editNews',['data'=>$data]);
    }
    public function postNewsEdit(NewsEditRequest $request , $id){
        $news=News::findOrFail($id);
        $news->title=$request->title;
        $news->metatitle=str_slug($request->title,'-');
        $img       =$request->file('sourceImg');
        if($request->hasFile('sourceImg')){
            $anhcu=$request->anhhientai;
            $path='/Image/News/';
            if(file_exists(public_path().$path.$anhcu)){
                File::delete(public_path().$path.$anhcu);
            }
            $name=time().'-'.$img->getClientOriginalName();
            $patch='Image/News/';
            $img->move($patch,$name);
            $news->image = $name;
        }
        $news->status=$request->status;
        $news->intro=$request->intro;
        $news->content=$request->content;
        $news->user_id=Auth::user()->id;
        $news->updated_at=new DateTime();
        $news->save();
        return redirect() -> route('getNewsList') -> with(['flash_level' => 'result_msg','flash_message' => 'Sửa thành công !']);
    }
    public function getNewsDelete($id){
        $news=News::findOrFail($id);
        $path='/Image/News/';
            if(file_exists(public_path().$path.$news->image)){
                File::delete(public_path().$path.$news->image);
            }
        $news->delete();
        return redirect() -> route('getNewsList') -> with(['flash_level' => 'result_msg','flash_message' => 'Xóa thành công !']);
    } 
    public function getGioiThieu()
    {
       return view('admin.Manager.addIntro');
    }
    public function postGioiThieu(FooterAddRequest $request)
    {
        $footer = new Footer;
        $footer->gioithieu=$request->gioithieu;
        $footer->lhqc=$request->lhqc;
        $footer->dksd=$request->dksd;
        $footer->csrt=$request->csrt;
        $footer->banquyen=$request->banquyen;
        $footer->facebook=$request->facebook;
        $footer->google=$request->google;
        $footer->twitter=$request->twitter;
        $footer->save();
        return redirect()->route('getList')->with(['flash_level' => 'result_msg','flash_message' => 'Thêm thành công !']);
    }
    public function getList()
    {
        $data=Footer::get()->toArray();
        return view('admin.Manager.listFooter',['data'=>$data]);
    }
    public function getSup()
    {
        $data=Errors::orderBy('id','DESC')->get()->toArray();
        return view('admin.Manager.support',['data'=>$data]);
    }
    public function getChiTietLoi($id)
    {
        $data=Errors::where('id',$id)->get()->toArray();
        return view('admin.Manager.chiTietLoi',['data'=>$data]);
    }
    public function getSuaLoi($id)
    {
        $data=Errors::where('id',$id)->get()->toArray();
        return view('admin.Manager.suaLoi',['data'=>$data]);
    }
    public function postSuaLoi(Request $request,$id)
    {
        $errors=Errors::find($id);
        $errors->status=$request->status;
        $errors->save();
        return redirect()->route('getSup')->with(['flash_level'=>'result_msg','flash_message'=>'Update lỗi thành công !']);
    }
    public function getXoaLoi($id)
    {
        $errors=Errors::find($id);
        $errors->delete();
        return redirect()->route('getSup')->with(['flash_level'=>'result_msg','flash_message'=>'Xóa thành công !']);
    }
}
