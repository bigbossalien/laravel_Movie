@extends('admin.master')
@section('title','Xóa Category')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Delete Tập Tin
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-ban"></i> Forms
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
			<form method="POST">
                <fieldset style="border-radius: 5px">
                    <legend style="border: 1px solid #ccc;text-align: center;color: red"><i class="fa fa-ban"> Delete</i></legend>
                    <label for="name">Tên Category</label>
                    <p>Tên Category</p>
                    <br>
                    <label for="metatitle">MetaTitle</label>
                    <p>MetaTitle</p>
                    <br>
                    <label for="parent">Thuộc Cấp</label>
                    <p>Thuộc Cấp</p>
                </fieldset>    
                <br>  
                <hr>
                <input type="submit" value="Delete" name="delete" class="btn btn-default" onclick="return confirm('Are you sure')" /> 
				<hr>							
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection