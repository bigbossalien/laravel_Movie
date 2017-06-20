<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng Nhập Quản Trị Viên</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('lrv12_admin/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="{!! asset('lrv12_admin/css/sb-admin-2.css') !!}" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="{!! asset('lrv12_admin/font-awesome-4.6.3/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- Js -->
    <script src="{!! asset('lrv12_admin/js/jquery-3.0.0.min.js') !!}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#submit").click(function() {
                var x = 0;

                var emails=$('#email').val();
                var passwords=$('#password').val();

                var checkInput = new Array(emails,passwords);
                var insertInput = new Array("E-mail","Mật Khẩu");

                if(checkInput[0] == ""){
                    $('#email').after('<p class="errorEmail">Vui Lòng Nhập ' + insertInput[0] + '</p>');
                    x++;
                }

                if(checkInput[1] == ""){
                    $('#password').after('<p class="errorPass">Vui Lòng Nhập ' + insertInput[1] + '</p>');
                    x++;
                }

                if(x == 0){
                    return true;
                }else{
                    $('.errorEmail').css('color','red');
                    $('.errorPass').css('color','red');
                    $('.errorEmail').delay(2000).slideUp(1000);
                    $('.errorPass').delay(2000).slideUp(1000);
                    return false;
                }
            });
            function validateForm() {
               
            }
        });
    </script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top: 10%">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Login !!
                        @if($errors->has('errorLogin'))
                            <span style="color:red;font-size: 12px;margin: 0% 0% 0% 2%">{{ $errors->first('errorLogin') }}</span>
                        @endif
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4 col-sm-4">
                            <img src="{!! url('Image/lock.ico') !!}" id="icon_lock" alt="icon-lock" style="width: 100%">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <form method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" value="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="">
                                    </div>
                                    <!-- <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Ghi Nhớ
                                        </label>
                                    </div> -->
                                    <input type="submit" value="Đăng Nhập" name="submit" id="submit" class="btn btn-lg btn-success btn-block" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;font-size: 14px;font-family: tahoma">Copyright &copy; 2016  </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
