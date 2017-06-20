<?php
use Illuminate\Http\Request; 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix' => '/','namespace' => 'Fontend'],function(){
    Route::get('not-found',['as'=>'get404','uses'=>'mainController@get404']);
    Route::get('/', ['as' => 'index', 'uses' => 'mainController@getIndex']);
    Route::get('chi-tiet/{id}/{i}.{thuoc}-{metatitle}',['as' => 'detail','uses' => 'mainController@getDetail'])->where('id','[0-9]+');
    Route::get('danh-muc/{id}.{i}/{metatitle}', ['as' => 'danhmuc', 'uses' => 'mainController@getDanhMuc'])->where('id', '[0-9]+');
    Route::get('danh-sach/{id}/{metatitle}', ['uses' => 'mainController@getDanhSach'])->where('id', '[0-9]+');
    // Route::get('/tim-kiem',['as'=>'timkiem','uses'=>'mainController@getSearch']);
    // Route::post('/tim-kiem',['uses'=>'mainController@postSearch']);
    Route::post('tim-kiem',['as' => 'getSearch','uses'=>'mainController@getSearch']);
    Route::get('tim-kiem/{keyword}.html',['as' => 'getSResult','uses'=>'mainController@getSResult']);
    Route::get('xem-phim/{id}.{idc}t{tap}-{metatitle}', ['as' => 'xemphim', 'uses' => 'mainController@getMovie'])->where('id', '[0-9]+');
    Route::get('tin-tuc',['as'=>'getNews','uses' => 'mainController@getNews']);
    Route::get('chi-tiet-tin/{id}-{metatitle}',['as'=>'getNewsItem','uses' => 'mainController@getNewsItem'])->where('id', '[0-9]+');
    Route::get('gioi-thieu',['uses'=>'mainController@getGioiThieu']);
    Route::get('quang-cao',['uses'=>'mainController@getQuangCao']);
    Route::get('dieu-khoan-su-dung',['uses'=>'mainController@getDKSD']);
    Route::get('chinh-sach-rieng-tu',['uses'=>'mainController@getCSRT']);
    Route::get('ban-quyen',['uses'=>'mainController@getBanQuyen']);
    Route::get('bao-loi',['uses'=>'mainController@getErrors']);
    Route::post('bao-loi',['uses'=>'mainController@postErrors']);
    
    Route::group(['middleware' => 'VerifyUser'],function(){
        Route::get('thong-tin',['as'=>'getInfo','uses'=>'mainController@getInfo']);
        Route::get('thong-tin/{id}/{username}',['as'=>'getIEdit','uses'=>'mainController@getIEdit'])->where('id','[0-9]+');
        Route::post('thong-tin/{id}/{username}',['as'=>'postIEdit','uses'=>'mainController@postIEdit'])->where('id','[0-9]+');
        Route::get('anh-dai-dien-{id}.{username}',['as'=>'getAvata','uses'=>'mainController@getAvata'])->where('id','[0-9]+');
        Route::post('anh-dai-dien-{id}.{username}',['as'=>'postAvata','uses'=>'mainController@postAvata'])->where('id','[0-9]+');
        Route::get('mat-khau-{id}.{username}',['as'=>'getPassword','uses'=>'mainController@getPassword'])->where('id','[0-9]+');
        Route::post('mat-khau-{id}.{username}',['as'=>'postPassword','uses'=>'mainController@postPassword'])->where('id','[0-9]+');
    });
    
});


Route::get('log-ad', ['as'  => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('log-ad', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('logout', ['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);

Route::get('dang-ky', ['as'  => 'getdangky', 'uses' => 'LoginController@getdangky']);
Route::post('dang-ky', ['as'  => 'postdangky', 'uses' => 'LoginController@postdangky']);

Route::get('dang-nhap', ['as'  => 'getdangnhap', 'uses' => 'LoginController@getdangnhap']);
Route::post('dang-nhap', ['as' => 'postdangnhap', 'uses' => 'LoginController@postdangnhap']);


Route::group(['middleware' => 'VerifyAdmin'], function () {
    
    Route::group(['prefix' => 'mv12_admin','namespace' => 'Manager'],function(){
        
        Route::get('/',function(){
            return view('admin.Dashboard.main');
        });
        Route::group(['prefix' => 'category'],function()
        {
            Route::get('add',['as' => 'getCateAdd', 'uses' => 'CateController@getCateAdd']);
            Route::post('add',['as' => 'postCateAdd', 'uses' => 'CateController@postCateAdd']);
            Route::get('list',['as' => 'getCateList', 'uses' => 'CateController@getCateList']);
            Route::get('delete/{id}',['as' => 'getCateDel','uses' => 'CateController@getCateDel'])->where('id', '[0-9]+');
            Route::get('edit/{id}',['as' => 'getCateEdit', 'uses' => 'CateController@getCateEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}',['as' => 'postCateEdit', 'uses' => 'CateController@postCateEdit'])->where('id', '[0-9]+');
        });
        Route::group(['prefix' => 'user'],function()
        {
            Route::get('add',['as' => 'getUserAdd' , 'uses' => 'UserController@getUserAdd']);
            Route::post('add',['as' => 'postUserAdd', 'uses' => 'UserController@postUserAdd']);
            Route::get('list',['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
            Route::get('delete/{id}',['as' => 'getUserDel','uses' => 'UserController@getUserDel'])->where('id', '[0-9]+');
            Route::get('edit/{id}',['as' => 'getUserEdit','uses' => 'UserController@getUserEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}',['as' => 'postUserEdit','uses' => 'UserController@postUserEdit'])->where('id', '[0-9]+');
            
        });
        Route::group(['prefix' => 'file'],function() 
        {
            Route::get('add/{id}/{metatitle}',['as' => 'getFileAdd' , 'uses' => 'FileController@getFileAdd'])->where('id', '[0-9]+');
            Route::post('add/{id}/{metatitle}',['as' => 'postFileAdd', 'uses' => 'FileController@postFileAdd'])->where('id', '[0-9]+');
            Route::get('list',['as' => 'getFileList', 'uses' => 'FileController@getFileList']);
            Route::get('adds',['as' => 'getFile', 'uses' => 'FileController@getFile']);
            Route::get('listitem',['as' => 'getFileItemList', 'uses' => 'FileController@getFileItemList']);
            Route::get('additem/{id}',['as' => 'getFileItemAdd' , 'uses' => 'FileController@getFileItemAdd'])->where('id', '[0-9]+');
            Route::post('additem/{id}',['as' => 'postFileItemAdd' , 'uses' => 'FileController@postFileItemAdd'])->where('id', '[0-9]+');
            Route::get('edititem/{id}',['as' => 'getFileItemEdit' , 'uses' => 'FileController@getFileItemEdit'])->where('id', '[0-9]+');
            Route::post('edititem/{id}',['as' => 'postFileItemEdit' , 'uses' => 'FileController@postFileItemEdit'])->where('id', '[0-9]+');
            Route::get('deleteitem/{id}',['as' => 'getFileItemDel' , 'uses' => 'FileController@getFileItemDel'])->where('id', '[0-9]+');
            Route::get('edit/{id}/{i}',['as' => 'getFileEdit' , 'uses' => 'FileController@getFileEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}/{i}',['as' => 'postFileEdit', 'uses' => 'FileController@postFileEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}',['as' => 'getFileDel' , 'uses' => 'FileController@getFileDel'])->where('id', '[0-9]+');
        });
        Route::group(['prefix' => 'quan-ly' ],function(){
            Route::get('mana',['as' => 'getMana' ,'uses' => 'ManagerController@getMana']);
            Route::get('them-slide',['as' => 'getAddSlide' , 'uses' => 'ManagerController@getAddSlide']);
            Route::post('them-slide',['as' => 'postAddSlide' , 'uses' => 'ManagerController@postAddSlide']);
            Route::get('danh-sach',['as' => 'getSlideList' , 'uses' => 'ManagerController@getSlideList']);
            Route::get('sua-slide/{id}',['as' => 'getEditSlide' , 'uses' => 'ManagerController@getEditSlide'])->where('id', '[0-9]+');
            Route::post('sua-slide/{id}',['as' => 'postEditSlide' , 'uses' => 'ManagerController@postEditSlide'])->where('id', '[0-9]+');
            Route::get('xoa-slide/{id}',['as' => 'getDelSlide' , 'uses' => 'ManagerController@getDelSlide'])->where('id', '[0-9]+');
            Route::get('them-tin-tuc',['as'=>'getNewsAdd','uses' => 'ManagerController@getNewsAdd']);
            Route::post('them-tin-tuc',['as'=>'postNewsAdd','uses' => 'ManagerController@postNewsAdd']);
            Route::get('danh-sach-tin-tuc',['as'=>'getNewsList','uses' => 'ManagerController@getNewsList']);
            Route::get('sua-tin/{id}',['as'=>'getNewsEdit','uses' => 'ManagerController@getNewsEdit'])->where('id', '[0-9]+');
            Route::post('sua-tin/{id}',['as'=>'postNewsEdit','uses' => 'ManagerController@postNewsEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}',['as'=>'getNewsDelete','uses' => 'ManagerController@getNewsDelete'])->where('id', '[0-9]+');
        });
        Route::group(['prefix' => 'footer'],function(){
            Route::get('gioithieu',['as' => 'getGioiThieu','uses' => 'ManagerController@getGioiThieu']);
            Route::post('gioithieu',['as' => 'postGioiThieu','uses' => 'ManagerController@postGioiThieu']);
            Route::get('list-footer',['as'=> 'getList','uses'=> 'ManagerController@getList']);
        });
        Route::group(['prefix' => 'support'],function(){
            Route::get('ho-tro',['as'=>'getSup','uses'=>'ManagerController@getSup']);
            Route::get('chi-tiet-loi/{id}',['uses'=>'ManagerController@getChiTietLoi'])->where('id', '[0-9]+');
            Route::get('sua-loi/{id}',['uses'=>'ManagerController@getSuaLoi'])->where('id', '[0-9]+');
            Route::post('sua-loi/{id}',['uses'=>'ManagerController@postSuaLoi'])->where('id', '[0-9]+');
            Route::get('xoa-loi/{id}',['uses'=>'ManagerController@getXoaLoi'])->where('id', '[0-9]+');
        });
    });

 });
Route::auth();

Route::get('/home', 'HomeController@index');
