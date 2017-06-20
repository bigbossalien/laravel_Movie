@extends('admin.master')
@section('title','Danh Sách Video')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh Sách Tập Tin
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-list"></i> Forms
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
                    <li class="list-group-item"><a href="{!! url('mv12_admin/file/add/'.$item['id'].'/'.$item['metatitle'].'') !!}">{!! $item['name'] !!}</a></li>
                @endforeach
                </ul>
            </div>
            <hr>
            <a href="{!! route('getFileItemList') !!}"><i class="fa fa-list"></i> Danh Sách Source</a>
        </div>
        <div class="col-md-9">
            @include('admin.Errors.flash')
			<table>
                <tr style="background-color: #e7e7e7;height: 30px">
                    <th style="width: 10%">STT</th>
                    <th style="width: 50%">Tiêu Đề</th>
                    <th style="width: 10%">Số Tập</th>
                    <th style="width: 10%">Người Up</th>
                    <th style="width: 20%">Quản Lý</th>
                </tr>   
                   <?php ListFile($dataList) ?>       
            </table>
        </div>
    </div>
    <!-- /.row -->
    

</div>
<style type="text/css">
    table{
        background-color: #f5f5f5;border: 1px solid #fafafa;height: auto;width: 100%;font-family: sans-serif;
    }
    table th{
        border: 1px solid #898989;text-align: center;color: #008f02
    }
    table tr{
        border: 1px solid #ccc;
        height: 30px
    }
    table td{
        border: 1px solid #ccc;
        text-align:center;
    }
</style>
@endsection