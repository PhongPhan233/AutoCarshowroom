<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.min.js"></script>

    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title of site -->
    <title>AutoShowroom</title>

    <!-- favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootsnav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- HTML5 shim for IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- top-area Start -->
    <div class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default bootsnav navbar-sticky navbar-scrollspy"
                 data-minus-value-desktop="70"
                 data-minus-value-mobile="55"
                 data-speed="1000">

                <div class="container">
                    <!-- Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand {{ request()->is('index') ? 'active' : '' }}" href="{{ route('home') }}">
                            AutoShowroom<span></span>
                        </a>
                    </div>

                    <!-- Navbar Links -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class="{{ request()->is('index') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="{{ request()->is('danhsach') ? 'active' : '' }}">
                                <a href="{{ route('list') }}">Mẫu xe</a>
                            </li>
                            <li class="{{ request()->is('dichvu') ? 'active' : '' }}">
                                <a href="{{ route('service') }}">Dịch vụ</a>
                            </li>
                            
                            <li class="{{ request()->is('chitiet') ? 'active' : '' }}">
                                <a href="{{ route('blog') }}">Nổi bật</a>
                            </li>
                            <li class="{{ request()->is('baiviet') ? 'active' : '' }}">
                                <a href="{{ route('blog') }}">Bài viết</a>
                            </li>
                            <li class="{{ request()->is('lienhe') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}">Liên hệ</a>
                            </li>

                            @if(Auth::check())
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" role="button">
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="logout-btn">Đăng xuất</button>

                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="{{ request()->is('dangnhap') ? 'active' : '' }}">
                                    <a href="{{ route('login') }}">ĐĂNG NHẬP</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </div><!--/.header-area-->
        <div class="clearfix"></div>
    </div>
    <!-- top-area End -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootsnav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
