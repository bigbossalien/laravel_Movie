<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng Nhập Thành Viên</title>
    <!-- Js -->
    <script src="{!! asset('lrv12_admin/js/jquery-3.0.0.min.js') !!}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Custom Fonts -->
    <link href="{!! asset('lrv12_admin/font-awesome-4.6.3/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    
    <style type="text/css">
        .f-login{
            margin-top: 10%;
            border: 1px solid #ccc;
            padding: 5%;
            border-radius: 5px;
        }
        .f-login a:hover{text-decoration: none;}
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{!! url('/') !!}">Trang Chủ</a>
                    </div>
            
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{!! url('dang-nhap') !!}">Đăng Nhập</a></li>
                            <li><a href="{!! url('dang-ky') !!}">Đăng Ký</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
            <div class="col-md-6 col-md-offset-3">
            @include('fontend.errors.flash')
            <script type="text/javascript">
                $('.alert-success').delay(2000).slideUp(500);
            </script>
            <div class="f-login">
                <form method="POST" role="form">
                    <legend>Đăng Nhập Thành Viên
                    @if($errors->has('loi-dang-nhap'))
                        <span id="loi-dang-nhap" style="color:red;font-size: 12px;margin: 0% 0% 0% 2%">{{ $errors->first('loi-dang-nhap') }}</span>
                    @endif
                    </legend>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#loi-dang-nhap').delay(2500).slideUp(500); 
                        });
                    </script>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" required autofocus class="form-control" id="email" name="email" placeholder="Vui lòng nhập email ">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="Vui lòng nhập Mật Khẩu ">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember">
                            Remember me !
                        </label>
                    </div>

                    <button type="submit" class="btn btn-danger"><i class="fa fa-user"></i> Đăng Nhập</button>
                   
                </form>
            </div>
            </div>
        </div>
    </div>


</body>

</html>
