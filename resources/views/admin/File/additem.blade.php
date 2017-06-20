@extends('admin.master')
@section('title','Thêm Source')
@section('content')
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm Source
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
                    <legend style="border: 1px solid #ccc;text-align: center;color: blue"><i class="fa fa-plus"> Thêm</i></legend>
                    <label for="taptin">Thuộc Tập Tin</label>
                    <select name="taptin" id="taptin" class="form-control">
                        <?php 
                            foreach ($data as $item) {
                                echo "<option value='".$item['id']."'>".$item['title']."</option>";
                            }
                        ?>
                    </select>
                    <br>
                    <label for="source">Source</label>
                    <span class="requiredSou">File phải có định dạng : mp4,mav,mpeg,avi</span>
                    <input type="file" id="source" name="source" accept=".mp4,.mav,.mpeg,.avi" />
                    <p id="errorSource" style="color: red;"></p>
                    <br>
                    <label for="link">Link Video</label>
                    <input type="url" name="link" id="link" value="{!! old('link') !!}" class="form-control" />
                    <p id="errorLink" style="color: red;"></p>
                    <br>
                    <label for="sourceImg" id="labelImg">Ảnh Minh Họa</label>
                    <span class="requiredImg">Ảnh phải có định dạng : png,jpg,gif,jpeg</span>
                    <input type="file" id="sourceImg" name="sourceImg" accept=".png,.jpg,.gif,.jpeg" />
                    <p id="errorImg" style="color: red;"></p>
                    <br>
                    <label for="tap">Tập</label>
                    <input type="number" step="1" max="1000" min="1" name="tap" class="form-control" id="tap" value="{!! old('tap') !!}" />
                </fieldset> 
                <br>  
                <hr>
                <input type="submit" value="Create" id="createAdd" name="create" class="btn btn-default" />       
                <hr>     
            </form>
        </div>
    </div>
    <!-- /.row -->
  
</div>
@endsection