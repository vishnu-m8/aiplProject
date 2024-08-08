<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Register</title>

    <link rel="stylesheet" href="{{ asset('public/assets/styles/style.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/waves/waves.min.css') }}">

</head>

<body>
<div id="single-wrapper">

        <form method="POST" action="{{ route('store') }}" class="frm-single">
            @csrf
            <div class="inside">
                <div class="title"><strong>AIPL</strong>Admin</div>
               
                <div class="frm-title">Register</div>
             
                <div class="frm-input"><input type="text" name="name" placeholder="Name" class="frm-inp" value="{{ old('name') }}" required><i
                        class="fa fa-user frm-ico"></i>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="frm-input"><input type="email" name="email" placeholder="Email" class="frm-inp" value="{{ old('email') }}"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required><i
                        class="fa fa-envelope frm-ico"></i>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                

                <div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"  required><i
                        class="fa fa-lock frm-ico"></i>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
              
                <!-- <div class="clearfix margin-bottom-20">
                    <div class="checkbox primary"><input type="checkbox" id="accept"><label for="accept">I accept Terms
                            and Conditions</label></div>
                  
                </div> -->
              
                <button type="submit" class="frm-submit">Register<i class="fa fa-arrow-circle-right"></i></button>
                <div class="row small-spacing">
                    <div class="col-sm-12">
                        <!-- <div class="txt-login-with txt-center">or register with</div> -->
                        
                    </div>
                  
                </div>
              
                <!-- <div class="frm-footer">facilonservices © 2023.</div> -->
              
            </div>

        </form>

    </div>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
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