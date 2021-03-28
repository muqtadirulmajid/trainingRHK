<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('loginAssets/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/vendor/bootstrap/css/bootstrap.min.cs') }}s">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.cs') }}s">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginAssets/fonts/Linearicons-Free-v1.0.0/icon-font.min.cs') }}s">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/vendor/animate/animate.cs') }}s">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/vendor/css-hamburgers/hamburgers.min.cs') }}s">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/vendor/select2/select2.min.cs') }}s">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/css/util.cs') }}s">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginAssets/css/main.cs') }}s">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('loginAssets/images/bg-siar.jpg') }}');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="login100-form-avatar">
                        <img src="{{asset('assets/images/dataimg/LogoKH.png') }}" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Selamat datang, Bapak/ibu di sistem informasi KNOWLEDGE HUB
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                            placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                            placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="#" class="txt1">
                            Lupa Password?
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('loginAssets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginAssets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('loginAssets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginAssets/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginAssets/js/main.js') }}"></script>

</body>

</html>