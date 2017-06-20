@extends('admin.master')
@section('title','Danh Sách Video')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh Sách Source
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
            <a href="{!! route('getFileList') !!}"><i class="fa fa-list"></i> Danh Sách</a>
            <hr>
            <a href="{!! route('getFileItemList') !!}"><i class="fa fa-list"></i> Danh Sách Source</a>
        </div>
        <div class="col-md-9">
            @include('admin.Errors.flash') 
            
            <?php 
            $stt=0;
                foreach ($data as $item) {
                    $stt++;
                    echo 
                    "
                    <h5>".$stt." - - <span style='color:#0600ff;font-family:sans-serif;font-size:18px'>".$item['products']['title']."</span></h5>
                    <table>
                        <tr>
                            <th style='width:20%'><i>Source</i></th>
                            <td style='width:80%'>".$item['source']."</td>
                        </tr>
                        <tr>
                            <th><i>Link</i></th>
                            <td>".$item['link']."</td>
                        </tr>
                        <tr>
                            <th><i>Tập</i></th>
                            <td>".$item['tap']."</td>
                        </tr>
                        <tr>
                            <th><i>Quản Lý</i></th>
                            <td><a href ='edititem/".$item['id']."' title='Sửa'>Chỉnh Sửa</a> || <a href='deleteitem/".$item['id']."' onclick='return confirm(\"Are you sure ?\")' style='color:red' title='Xóa'>Gở Bỏ</a></td>
                        </tr>
                    </table>  
                    <hr>
                    ";
                }
            ?>
            
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection
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