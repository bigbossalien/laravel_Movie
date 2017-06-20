<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>XAM | Admin @yield('title')</title> 

    <!-- Bootstrap Core CSS -->
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="{!! asset('lrv12_admin/css/sb-admin.css') !!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{!! asset('lrv12_admin/css/plugins/morris.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('lrv12_admin/font-awesome-4.6.3/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{!! asset('lrv12_admin/js/plugins/ckeditor/ckeditor.js') !!}"></script>


</head>

<body>

    <div class="col-md-10 col-md-offset-1 wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! url('mv12_admin') !!}">Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a style="cursor: pointer" class="dropdown_user"><i class="fa fa-user"></i> {!! Auth::user() -> username !!} </a>
                </li>
                <li><a href="{{ url('/') }}" target="_blank"><i class="fa fa-eye"></i> Websites</a></li>
                <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Đăng Xuất</a></li>
            </ul>
        </nav>

        <div id="page-wrapper">
			@yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('lrv12_admin/js/jquery-3.0.0.min.js') !!}"></script>


    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('lrv12_admin/js/plugins/morris/raphael.min.js') !!}"></script>
    <!-- <script src="{!! asset('lrv12_admin/js/plugins/morris/morris.min.js') !!}"></script>
    <script src="{!! asset('lrv12_admin/js/plugins/morris/morris-data.js') !!}"></script> -->
    <script type="text/javascript" src="{!! asset('lrv12_admin/js/js.js') !!}"></script>
    <script type="text/javascript">
        var editor = CKEDITOR.replace('content',{
            language:'vi',
            filebrowserImageBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Images') }}",
            filebrowserFlashBrowseUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/ckfinder.html?Type=Flash') }}",
            filebrowserImageUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connctor/php/connector.php?command=QuickUpload&type=Images') }}",
            filebrowserFlashUploadUrl : "{{ asset('lrv12_admin/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
        });
    </script>
</body>

</html>
