<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>login</title>
    <link rel="stylesheet" href="{{ asset('public/assets/styles/style.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/waves/waves.min.css') }}">

</head>

<body>

    <div id="single-wrapper">
        <form action="{{ route('authenticate') }}" method="post" class="frm-single">
            @csrf
            <div class="inside">
            <div class="logo">
                <img src="{{ asset('public/assets/frontend/images/home/logo.png') }}" class="img" alt="New Logo">
            </div>
                <!-- /.title -->
                <div class="frm-title">Login</div>
                <!-- /.frm-title -->
                
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="frm-input"><input type="email" name="email" placeholder="Email" class="frm-inp"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required><i
                        class="fa fa-envelope frm-ico"></i>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <!-- /.frm-input -->
                <div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"
                        required><i class="fa fa-lock frm-ico"></i>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <a href="{{ route('password.request') }}">
                <p style="
    margin-top: -17px;
">Forgot Password</p>
</a>
                <!-- /.frm-input -->
                <div class="clearfix margin-bottom-20">
                    <div class="pull-left">
                        <div class="checkbox primary"><input type="checkbox" id="rememberme"><label
                                for="rememberme">Remember me</label></div>
                        <!-- /.checkbox -->
                    </div>
                    <!-- /.pull-left -->
                    <!-- <div class="pull-right"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div> -->
                    <!-- /.pull-right -->
                </div>
                <!-- /.clearfix -->
                <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
                <div class="row small-spacing">
                    <div class="col-sm-12">
                        <!-- <div class="txt-login-with txt-center">or login with</div> -->
                        <!-- /.txt-login-with -->
                    </div>
                    <!-- /.col-sm-12 -->
                    <!-- /.col-sm-6 -->
                    <!-- /.col-sm-6 -->
                </div>
                <!-- /.row -->
                <!-- <div class="frm-footer">facilonservices © 2023.</div> -->
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
    </div>
    <!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/script/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/script/respond.min.js') }}"></script>
<![endif]-->
    <!-- 
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('public/assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/waves/waves.min.js') }}"></script>

    <script src="{{ asset('public/assets/scripts/main.min.js') }}"></script>
</body>

</html>