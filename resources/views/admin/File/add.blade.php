@extends('admin.master')
@section('title','Thêm Category')
@section('content')
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm Tập Tin
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-plus-square"></i> Forms
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3" style="margin: 2% 0%">
            <a href="{!! route('getFileList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
            <form method="POST" enctype="multipart/form-data" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i>
                    @foreach($menu as $item)
                        <span style="color: red">{!! $item['name'] !!}</span>
                    @endforeach
                    </legend>
                    <label for="danhmuc">Thuộc Danh Mục</label>
                    <select name="danhmuc" id="danhmuc" class="form-control">
                        <?php MenuMulti($dataCate,$id,$str = "-",old('danhmuc')) ?> 
                    </select>
                    <br>
                    <label for="title"><span class="required">*</span> Tiêu Đề</label>
                    <input type="text" id="title" name="title" required="required" class="form-control" value="{!! old('title') !!}" />
                    <br>
                    <label for="author"><span class="required">*</span> Đạo Diễn</label>
                    <input type="text" id="author" name="author" required="required" class="form-control" value="{!! old('author') !!}" />
                    <br>
                    <label for="nhanvat"><span class="required">*</span> Nhân Vật</label>
                    <input type="text" id="nhanvat" name="nhanvat" required="required" class="form-control" value="{!! old('nhanvat') !!}" />
                    <br>
                    <label for="nhasx"><span class="required">*</span> Nhà Sản Xuất</label>
                    <input type="text" id="nhasx" name="nhasx" required="required" class="form-control" value="{!! old('nhasx') !!}" />
                    <br>
                    <label for="namsx">Năm Sản Xuất</label>
                    <select name="namsx" id="namsx" class="form-control">
                    <?php 
                        $stt=0;
                        for ($i=2016; $i >=2010 ; $i--) { 
                            $stt++;
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                    ?>
                    </select>
                    <br>
                    <label for="sourceImg" id="labelImg"><span class="required">*</span> Ảnh Bìa</label>
                    <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                    <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                    <br>
                    <label for="trailer">Link Trailer</label>
                    <input type="text" name="trailer" id="trailer" class="form-control" value="{!! old('trailer') !!}" />
                    <br>
                    <label for="intro"><span class="required">*</span> Giới Thiệu</label>
                    <textarea name="intro" id="intro" class="form-control" rows="10">{!! old('intro') !!}</textarea>
                    <br>
                    <label for="content"><span class="required">*</span> Nội Dung</label>
                    <textarea name="content" id="content">{!! old('content') !!}</textarea>
                    <br>
                    <label>Xuất File</label>
                    <select name="status" id="status" class="form-control">
                    <?php 
                        for ($i=0; $i <=1 ; $i++) { 
                            if( $i==0 ){
                                echo "<option value='$i'>Có</option>";
                            }else{
                                echo "<option value='$i'>Không</option>";
                            }
                        }
                    ?>
                    </select>
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Create" name="create" class="btn btn-default" />       
                <hr>     
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection