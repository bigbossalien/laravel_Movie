@extends('admin.master')
@section('title','Quản Lý Hỗ Trợ')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Support Errors
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
        <div class="col-md-2" style="margin: 2% 0%">
            <a href="{!! route('getNewsAdd') !!}"><i class="fa fa-plus"></i> Thêm Mới</a>
        </div>
        <div class="col-md-10">
            @include('admin.Errors.flash')
			<table>
                <tr style="background-color: #e7e7e7;height: 30px">
                    <th style="width: 5%">STT</th>
                    <th style="width: 20%">Họ Tên</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 30%">Lý Do</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 10%">Quản Lý</th>
                </tr>   
                <?php 
                $stt=0;
                	foreach ($data as $item) {
                		$stt++;
                		echo "
						<tr>
							<td><a href='chi-tiet-loi/".$item['id']."'>".$stt."</a></td>
							<td>".$item['hoten']."</td>
							<td>".$item['email']."</td>
							<td>".$item['lydo']."</td>";
							if($item['status'] == 1){
								echo "<td><i class='fa fa-exclamation' style='color:red'></i></td>";
							}else{
								echo "<td><i class='fa fa-check' style='color:green'></i></td>";
							}
						echo  "
							<td><a href='sua-loi/".$item['id']."' title='Sửa'><i class='fa fa-edit' style='color: blue'></i></a> || <a href='xoa-loi/".$item['id']."' onclick='return confirm(\"Are you sure ?\")' title='Xóa'><i class='fa fa-trash-o' style='color: red'></i></a></td>
						</tr>";
                	}
                ?> 
            </table>
        </div>
    </div>
    <!-- /.row -->
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
</div>
@endsection