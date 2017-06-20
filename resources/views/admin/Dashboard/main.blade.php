@extends('admin.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard <small>Statistics Overview</small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>New Comments!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">  
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php 
                                    use App\Models\User;
                                    echo User::count();
                                ?>
                            </div>
                            <div>Thành Viên</div>
                        </div>
                    </div>
                </div>
                <a href="{!! route('getUserList') !!}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php 
                                    use App\Models\Errors;
                                    $errors=Errors::select(DB::raw('count(id) as cid'))->where('status','1')->get();
                                    foreach ($errors as $item) {
                                        echo $item['cid'];
                                    }
                                ?>
                            </div>
                            <div>Errors Alert !</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('getSup') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>Support Tickets!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="border: none">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-cog fa-fw"></i> Mục Quản Lý</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <div class="mana">
                            <div class="panel-heading">
                                <img src="{!! url('Image/add_folder.png') !!}">
                            </div>
                            <div class="panel-body">
                                <a href="{!! route('getCateList') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Danh Sách danh mục</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mana">
                            <div class="panel-heading">
                                <img src="{!! url('Image/add_user.png') !!}">
                            </div>
                            <div class="panel-body">
                                <a href="{!! route('getUserList') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Danh Sách thành viên</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mana">
                            <div class="panel-heading">
                                <img src="{!! url('Image/add_file.png') !!}">
                            </div>
                            <div class="panel-body">
                                <a href="{!! route('getFileList') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Danh Sách tập tin</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mana">
                            <div class="panel-heading">
                                <img src="{!! url('Image/manager.png') !!}">
                            </div>
                            <div class="panel-body">
                                <a href="{!! route('getMana') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Quản Lý</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


</div>
<!-- /.container-fluid -->
@endsection