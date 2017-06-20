<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Cate;
use App\Models\Iproducts;
use App\Models\Slide;
use App\Models\News;
use App\Models\User;
use App\Models\Footer;
use App\Models\Errors;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\PasswordEditRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Illuminate\Support\MessageBag; 
use App\Services\Pagination;
use DateTime;

class mainController extends Controller
{
    public function get404()
    {
        return view('fontend.errors.404');
    }
    public function getIndex()
    {
        // $hanhdong=Products::with('cate')->with('iproducts')->where('id','5')->inRandomOrder()->limit(8)->get()->toArray();
        $hanhdong=DB::table('lrv12_products')
        ->join('lrv12_categorys','lrv12_products.cat_id','=','lrv12_categorys.id')
        ->select('lrv12_products.id as id','lrv12_products.title','lrv12_products.metatitle','lrv12_products.sotap','lrv12_products.image','lrv12_products.soluotxem','lrv12_products.status','lrv12_products.namsx','lrv12_categorys.id as i','lrv12_categorys.name','lrv12_products.intro','lrv12_products.loai_id')
        ->where('lrv12_products.cat_id','=','5')
        ->inRandomOrder()
        ->limit(8)
        ->get();
        $footer=Footer::get()->toArray();

        $news=News::orderBy('id','DESC')->limit(6)->get()->toArray();
        $menu=Cate::get()->toArray();
        //$slide=Slide::with('pro')->orderBy('id','DESC')->limit(3)->get()->toArray();
        $slide=DB::table('lrv12_slides')
        ->join('lrv12_products','lrv12_slides.metatitle','=','lrv12_products.metatitle')
        ->join('lrv12_categorys','lrv12_categorys.id','=','lrv12_products.cat_id')
        ->select('lrv12_slides.*','lrv12_products.id as i','lrv12_products.nhanvat','lrv12_products.author','lrv12_products.namsx','lrv12_products.nhasx','lrv12_products.sotap','lrv12_products.trailer','lrv12_products.content','lrv12_products.cat_id','lrv12_products.soluotxem','lrv12_products.intro','lrv12_categorys.name','lrv12_products.loai_id')
        ->orderBy('id','DESC')
        ->get();
        $phimmoi=Products::with('cate')->limit(4)->orderBy('id','DESC')->get()->toArray();
        $bangxephang=Products::with('cate')->limit(4)->orderBy('soluotxem','DESC')->get()->toArray();
        // echo "<pre>";
        // print_r($hanhdong);
        // echo "</pre>";
        return view('fontend.pages.index',[
            'hanhdong'    => $hanhdong,
            'menu'        => $menu,
            'slide'       => $slide,
            'news'        => $news,
            'footer'      => $footer,
            'phimmoi'     => $phimmoi, 
            'bangxephang' => $bangxephang,
            ]);
        // echo url()->current();
    }
    public function getDetail(Request $request,$id,$i,$thuoc)
    {
        $key='_'.$id;
        if(!Session::has($key)){
            Products::where('id',$id)->increment('soluotxem');
            Session::put($key,1);
        }
        $title=Products::select('title')->where('id',$id)->first();
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
        $data=Products::with('cate')->with('iproducts')->where('lrv12_products.id',$id)->get()->toArray();
        $count=Iproducts::select(DB::raw('count(products_id) as count,id,source'))->where('products_id',$id)->get()->toArray();

        $decu = Products::select()->with('cate')->where('id','<>',$id)->where('soluotxem','>=','1234')->where('loai_id',$thuoc)->inRandomOrder()->limit(3)->get()->toArray();

        $cungtheloai=Products::select()->with('cate')->where('cat_id',$i)->where('id','<>',$id)->limit(4)->orderBy('namsx','DESC')->inRandomOrder()->get()->toArray();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        //return $metatitle;
        return view('fontend.pages.detail',
            [
            'menu'     => $menu,
            'data'     => $data,
            'count'    => $count,
            'decu'     => $decu,
            'footer'   => $footer,
            'cungtheloai' => $cungtheloai, 
            'title'=>$title,
            ]);
    }
    public function getDanhMuc($id,$i)
    {
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();

        $title=Cate::select('name')->where('id',$id)->first();
        $m_title=Cate::select('name')->where('id',$i)->first();

        $decu=Products::with('cate')->where('cat_id',$id)->where('soluotxem','>=','1000')->limit(1)->inRandomOrder()->get()->toArray();
        $data=Products::with('cate')->where('cat_id',$id)->limit(6)->orderBy('id','DESC')->paginate(6);
        $tit=Cate::where('id',$i)->get()->toArray();
        $titchil=Cate::where('id',$id)->get()->toArray();
        $news=News::inRandomOrder()->limit(5)->get()->toArray();
        // echo "<pre>";
        // print_r($m_title);
        // echo "</pre>";
        return view('fontend.pages.danhmuc',[
            'menu' => $menu,
            'footer'=>$footer,
            'decu'=>$decu,
            'tit'=>$tit,
            'titchil'=>$titchil,
            'data'=>$data,
            'news'=>$news,
            'title'=>$title,
            'mtitle'=>$m_title
            ]);
    }
    public function getDanhSach($id)
    {
        $menu=Cate::get()->toArray();
        $title=Cate::select('name')->where('id',$id)->first();
        $footer=Footer::get()->toArray();
        $data=Products::with('cate')->where('loai_id',$id)->orderBy('id','DESC')->paginate(12);
        return view('fontend.pages.danh-sach',['menu'=>$menu,'footer'=>$footer,'data'=>$data,'title'=>$title]);
    }
    public function getMovie($id,$idc,$tap)
    {
        $menu=Cate::select()->get()->toArray();
        $footer=Footer::get()->toArray();
        $data=DB::table('lrv12_products')
            ->join('lrv12_iproducts','lrv12_products.id','=','lrv12_iproducts.products_id')
            ->where('lrv12_products.id','=',$id)
            ->where('lrv12_iproducts.id','=',$idc)
            ->get();
        $datas=Products::with('cate')->with('iproducts')
            ->where('lrv12_products.id',$id)
            ->get()
            ->toArray();

        $next=Iproducts::select('id','products_id','source','image_prew','link','tap')->with('products')->where('products_id',$id)->get()->toArray();
        // echo "<pre>";
        // print_r($next);
        // echo "</pre>";
        return view('fontend.pages.xemphim', 
            [
            'menu'  => $menu,
            'data'  => $data,
            'next'  => $next,
            'idc'   => $idc,
            'datas' => $datas,
            'tap'   => $tap,
            'footer'=>$footer,
            ]);
        //return $id;
    }
    public function getNews(){
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
        $news=News::with('user')->orderBy('id','DESC')->get()->toArray();
        return view('fontend.pages.tintuc',['menu'=>$menu,'footer'=>$footer,'news'=>$news]);
        // echo "<pre>";
        // print_r($news);
        // echo "</pre>";
    }
    public function getNewsItem(Request $request,$id)
    {
        $key = '_' . $id;
        if(!Session::has($key)){
            News::where('id', $id)->increment('soluotxem');
            Session::put($key, 1);
        }
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
        $news=News::with('user')->where('id',$id)->get()->toArray();
        $title=News::select('title')->where('id',$id)->first();
        $decu=News::inRandomOrder()->where('id','<>',$id)->limit(4)->get()->toArray();
        return view('fontend.pages.chitiettin',[
            'menu'=>$menu,
            'footer'=>$footer,
            'news'=>$news,
            'decu'=>$decu,
            'title'=>$title,
            ]);
    }
    public function getSearch(Request $request)
    {
        $menu=Cate::get()->toArray();
        $keyword=$request->inputsearch;
        return redirect()->route('getSResult',['keyword'=>$keyword]);
    }
    public function getSResult(Request $request,$keyword)
    {
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
        $result=DB::table('lrv12_products')
            ->join('lrv12_categorys','lrv12_products.cat_id','=','lrv12_categorys.id')
            ->where('title','LIKE','%'.$keyword.'%')
            ->select('lrv12_products.*','lrv12_categorys.name','lrv12_categorys.id as i')
            ->paginate(8);
        $counts=DB::table('lrv12_products')
            ->join('lrv12_categorys','lrv12_products.cat_id','=','lrv12_categorys.id')
            ->where('title','LIKE','%'.$keyword.'%')
            ->select('lrv12_products.*','lrv12_categorys.name')->count();
        return view('fontend.pages.result',['menu'=>$menu,'footer'=>$footer,'result'=>$result,'keyword'=>$keyword,'counts'=>$counts]);
    }
    public function getInfo()
    {
        $data=User::where('id',Auth::user()->id)->get()->toArray();
        return view('fontend.pages.trang-ca-nhan',['data'=>$data]);
    }
    public function getIEdit()
    {
        return view('fontend.pages.edit-trang-ca-nhan');
    }
    public function postIEdit(UserEditRequest $request,$id)
    {
        $update=User::find($id);
        $update ->hoten    =$request->hoten;
        $update ->diachi   =$request->diachi;
        $update ->birthday =$request->birthday;
        $update ->sex      =$request->sex;
        $update ->updated_at=new DateTime();
        $update->save();
        return redirect()->route('getInfo')->with(['flash_level' => 'result_msg','flash_message' => 'Update thành công !']);
    }
    public function getAvata($id)
    {   
        $data=User::where('id',$id)->get()->toArray();
        return view('fontend.pages.avata',['data'=>$data]);
    }
    public function postAvata(UserEditRequest $request,$id)
    {
        $avata=User::find($id);
        $img = $request->file('avata');
        if($request->hasFile('avata')){
            $avatacu=$request->avatacu;
            $patchcu="/fontend/image/avata-user/";
            if(file_exists(public_path().$patchcu.$avatacu)){
                File::delete(public_path().$patchcu.$avatacu);
            }
            $name = time().'-'.$img->getClientOriginalName();
            $patch="fontend/image/avata-user/";
            $img->move($patch,$name);
            $avata ->avata = $name;
        }
        $avata->save();
        return redirect()->route('getInfo')->with(['flash_level'=>'result_msg','flash_message'=>'Upload thành công !']);
    }
    public function getPassword($id)
    {
        $data=User::where('id',$id)->get()->toArray();
        return view('fontend.pages.matkhau',['data'=>$data]);
    }
    public function postPassword(PasswordEditRequest $request,$id)
    {
        $matkhau=User::find($id);
        if(Auth::user()->level == 0){
            return redirect()->back()->with(['flash_level'=>'result_msg','flash_message'=>'Bạn là Quản Trị Viên bạn không thể đổi mật khẩu ở đây !']);
        }else{
            if(Auth::user()->matkhau != $request->matkhaucu){
                return redirect()->back()->with(['flash_level'=>'result_msg','flash_message'=>'Mật khẩu cũ không đúng !']);
            }else{
                $matkhau->password=bcrypt($request->npassword);
                $matkhau->matkhau=$request->npassword;
                $matkhau->save();
                Auth::logout();
                return redirect('dang-nhap')->with(['flash_level'=>'result_msg','flash_message'=>'Thay mật khẩu thành công . Mời bạn đăng nhập lại !']);
            }
        }
    }
    public function getGioiThieu(){
       $menu=Cate::get()->toArray();
       $footer=Footer::get()->toArray();
       return view('fontend.pages.gioithieu',['menu'=>$menu,'footer'=>$footer]);
    }
    public function getQuangCao(){
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
       return view('fontend.pages.quangcao',['menu'=>$menu,'footer'=>$footer]);
    }
    public function getDKSD(){
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
       return view('fontend.pages.dksd',['menu'=>$menu,'footer'=>$footer]);
    }
    public function getCSRT(){
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
       return view('fontend.pages.csrt',['menu'=>$menu,'footer'=>$footer]);
    }
    public function getBanQuyen(){
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
       return view('fontend.pages.banquyen',['menu'=>$menu,'footer'=>$footer]);
    }
    public function getErrors(){
        $menu=Cate::get()->toArray();
        $footer=Footer::get()->toArray();
        return view('fontend.pages.baoloi',['menu'=>$menu,'footer'=>$footer]);
    }
    public function postErrors(Request $request){
        $errors = new Errors;
        $errors->hoten=$request->hoten;
        $errors->email=$request->email;
        $errors->lydo=$request->lydo;
        $errors->created_at = new DateTime();
        $errors->save();
        return redirect()->back()->with(['flash_level'=>'result_msg','flash_message'=>'Bạn đã báo lỗi thành công !']);
    }
}
