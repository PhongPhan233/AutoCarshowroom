@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <div class="login">
        <div class="container" id="container">
            <!-- Sign Up Form -->
            <div class="form-container sign-up-container">
                <form action="{{ route('register') }}" method="POST">
                @csrf
                    <h1></h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" name="username" placeholder="Tên" required/>
                    <input type="email" name="email" placeholder="Email" required/>
                    <input type="password" name="password" placeholder="Mật khẩu" required/>

                    <input type="password" name="confirmpassword" placeholder="Xác nhận mật khẩu" required/>
                    
                    <button>Sign Up</button>
                </form>
            </div>
            <!-- Forget Password Form -->
        <div class="form-container otp-request-container">
            <form id="otpForm" action="{{ route("send.otp") }}">
                @csrf
                <h1>Xác thực OTP</h1>
                <p>Nhập email để nhận mã OTP</p>
                <input type="email" name="email" id="otpEmail" placeholder="Email" required />

                <button type="button" id="sendOtpButton">Gửi mã OTP</button>
                <div id="message" style="margin-top: 10px; color: green;"></div>

                <p style="margin-top: 20px;">Nhập mã OTP bạn nhận được</p>
                <input type="text" name="otp" placeholder="Mã OTP" required />

                <button type="submit">Xác nhận OTP</button>

                <button type="button" class="ghost" id="backToSignInFromOtpForm">Trở lại đăng nhập</button>
            </form>
        </div>


            <!-- Sign In Form -->
            <div class="form-container sign-in-container">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1>Đăng nhập</h1>

                    @if(session('success'))
                        <script>
                            alert("{{ session('success') }}");
                            window.location.href = "{{ url('/') }}";
                        </script>
                    @endif

                    @if($errors->any())
                        <script>
                            alert("{{ $errors->first() }}");
                        </script>
                    @endif

                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>Hoặc sử dụng tài khoản của bạn</span>
                    <input type="email" name="email" placeholder="Email" required/>
                    <input type="password" name="password" placeholder="Mật khẩu" required/>
                    <a href="#"id="forgotPassword">Quên mật khẩu?</a>
                    <button type="submit">Đăng nhập</button>
                </form>
            </div>

            <!-- Overlay Panels -->
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Chào mừng tới Auto Carshowroom!</h1>
                        <p>Để giữ liên hệ với chúng tôi bạn có thể đăng nhập thông tin của bạn</p>
                        <button class="ghost" id="signIn">Đăng nhập</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Chào bạn!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Đăng kí</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });
    </script>
    <script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });
            $(window).on('resize', function(){
                ps.update();
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="{{ asset('js/map-custom.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

@endsection
