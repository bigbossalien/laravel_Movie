@extends('admin.master')
@section('title','Sửa Category')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa Tập Tin
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> Forms
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3" style="margin: 2% 0%">
            <p id="choose-cate" style="cursor: pointer;"><i class="fa fa-plus"></i> Thêm Mới</p>
            <div id="show-choose-cate">
                <ul class="list-group">
                @foreach($cate as $item)
                    <li class="list-group-item"><a href="{{ url('mv12_admin/file/add/'.$item['id'].'/'.$item['metatitle'].'') }}">{{ $item['name'] }}</a></li>
                @endforeach
                </ul>
            </div>
            <hr>
            <a href="{{ route('getFileList') }}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
			<form method="POST" enctype="multipart/form-data" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset style="border-radius: 5px">
                    <legend style="border: 1px solid #ccc;text-align: center;color: green"><i class="fa fa-edit"> Sửa</i></legend>
                        <label for="danhmuc">Thuộc Danh Mục</label>
                        <select name="danhmuc" id="danhmuc" class="form-control">
                            <?php MenuMulti($dataCate,$i,$str = "-",$parent['cat_id']) ?>
                        </select>
                        <br>
                        @foreach($file as $item)
                        <label for="title"><span class="required">*</span> Tiêu Đề </label>
                        <input type="text" id="title" name="title" required class="form-control" value="{{ $item['title'] }}" />
                        <br>
                        <label for="author"><span class="required">*</span> Đạo Diễn </label>
                        <input type="text" id="author" name="author" required class="form-control" value="{{ $item['author'] }}" />
                        <br>
                        <label for="nhanvat"><span class="required">*</span> Nhân Vật </label>
                        <input type="text" id="nhanvat" name="nhanvat" required class="form-control" value="{{ $item['nhanvat'] }}" />
                        <br>
                        <label for="nhasx"><span class="required">*</span> Nhà Sản Xuất </label>
                        <input type="text" id="nhasx" name="nhasx" required class="form-control" value="{{ $item['nhasx'] }}" />
                        <br>
                        <label for="namsx">Năm Sản Xuất</label><span style="color:blue;padding:0% 2%">{{ $item['namsx'] }}</span>
                        <select name="namsx" id="namsx" class="form-control">
                        <option value="{{ $item['namsx'] }}" selected>------</option>
                        <?php 
                            for ($i=2016; $i >=2010 ; $i--) { 
                                echo "<option value='".$i."'>".$i."</option>";
                            }
                        ?>
                        </select>

                        <br>
                        <label>Số Tập</label><span style="color:blue;padding:0% 2%">{{ $item['sotap'] }}</span>
                        <input type="hidden" name="sotapcu" value="{{ $item['sotap'] }}">
                        <input type="text" onkeyup="myfun()" name="sotap" class="form-control" />
                        <p id="errorTap" style="display:none;padding:1% 0%;color:red">Bạn chỉ được nhập số</p>
                        <br>

                        <label>Ảnh Bìa </label><br>
                        <img src="{{ url('Image/AnhBia/images/'.$item['image']) }}" id="anhmh" style="width:100px;height: 100px;" />
                        <input type="hidden" name="hinhhientai" value="{{ $item['image'] }}">
                        <hr>
                        <label for="sourceImg">Thay Ảnh</label>
                        <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                        <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                        <hr>
                        <label for="trailer">Link Trailer</label> 
                        <input type="text" name="trailer" id="trailer" class="form-control" value="{{ $item['trailer'] }}" />
                        <br>
                        <label for="intro"><span class="required">*</span> Giới Thiệu </label>
                        <textarea name="intro" id="intro" class="form-control" rows="10">{{ $item['intro'] }}</textarea>
                        <br>
                        <label for="content"><span class="required">*</span> Nội Dung </label>
                        <textarea name="content" id="content">{!! $item['content'] !!}</textarea>
                        <br>
                        <label>Xuất File</label>
                        <select name="status" id="status" class="form-control">
                            <option value='0'
                                @if($item['status']==0){
                                    selected 
                                }
                                @endif
                            >Có</option>
                            <option value='1'
                                @if($item['status']==1){
                                    selected 
                                }
                                @endif
                            >Không</option>
                        </select>
                        @endforeach
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Edit" name="edit" class="btn btn-default" />
                <hr>            
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection