@extends('admin.master')
@section('title','Khung Web')
@section('content')
<div class="container-fluid">
<style type="text/css">
    .panel-heading img{height: 195px}
</style>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Quản Lý <small>Toàn Bộ Khung</small>
            </h1>
        </div>
    </div>

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
                                <img src="{!! url('Image/add_slide.ico') !!}">
                            </div>
                            <div class="panel-body">
                                <a href="{!! route('getSlideList') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Mục Slide</span>
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
                                <img src="{!! url('Image/news.jpg') !!}">
                            </div>
                            <div class="panel-body">
                                <a href="{!! route('getNewsList') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Mục Tin Tức</span>
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
                                <a href="{!! route('getGioiThieu') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Mục Footer</span>
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
                                <a href="{!! route('getSup') !!}">
                                    <div class="panel-footer">
                                        <span class="pull-left">Quản Lý Lỗi</span>
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
</div>
@endsection