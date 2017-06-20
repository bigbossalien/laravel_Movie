@extends('admin.master')
@section('title','Sửa Source')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa Source
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
            <a href="{!! route('getFileList') !!}"><i class="fa fa-eye"></i> Danh Sách</a>
            <hr>
            <a href="{!! route('getFileItemList') !!}"><i class="fa fa-list"></i> Danh Sách Source</a>
        </div>
        <div class="col-md-8">
            @include('admin.Errors.errors')
			<form method="POST" enctype="multipart/form-data" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset style="border-radius: 5px">
                    <legend style="border: 1px solid #ccc;text-align: center;color: green"><i class="fa fa-edit"> Sửa</i></legend>
                        <label for="taptin">Thuộc Tập Tin</label>
                        <select name="taptin" id="taptin" class="form-control">
                        <?php 
                            foreach ($data as $item) 
                            {
                                echo "<option value='".$item['products']['id']."'>".$item['products']['title']."</option>";
                            }
                               echo  "</select>
                                <br>
                                <label>Source</label>
                                <p>".$item['source']."</p>
                                <input type='hidden' name='shientai' value='".$item['source']."'>
                                <hr>";
                        ?>
                        <label for="source">Thay Source</label>
                        <span class="requiredSou">File phải có định dạng : mp4,mav,mpeg,avi</span>
                        <input type="file" id="source" name="source" accept=".mp4,.mav,.mpeg,.avi" />
                        <br>
                        <?php foreach ($data as $item) {
                            echo "<label for='link'>Link Video</label>
                                 <input type='url' name='link' id='link' class='form-control' value='".$item['link']."' />
                                 <br>";
                        } ?>
                        
                        <?php 
                            foreach ($data as $item) {
                               echo "<label>Ảnh Minh Họa</label>
                                <img style='width:50%;height:200px' src='../../../Image/AnhBia/image_prew/".$item['image_prew']."'/>
                                <input type='hidden' name='ahientai' value='".$item['image_prew']."' />
                                <br>";
                            }
                            

                        ?>
                        <label for="sourceImg">Thay Ảnh</label>
                        <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                        <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                        <br>
                        <label for="tap">Tập</label>
                        <?php foreach ($data as $item) {
                            echo " <input type='text' name='tap' id='tap' class='form-control' value='".$item['tap']."' />";
                        } ?>
                       
                        <hr>
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" id="submitEdit" value="Edit" name="edit" class="btn btn-default" />
                <hr>            
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection