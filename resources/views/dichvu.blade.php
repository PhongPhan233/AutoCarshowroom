@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <title>Carservice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link href="{{ asset('css/service.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<section class="container text-center my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="service-box">
                <i class="fas fa-cogs"></i>
                <h3>Chất lượng dịch vụ</h3>
                <p>Mang đến cho quý khách các gói dịch vụ tốt nhất</p>
                <a href="#">Xem thêm</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-box">
                <i class="fas fa-users"></i>
                <h3>Chuyên môn</h3>
                <p>Hệ thống của chúng tôi tuyên chọn các nhân viên ưu tú về lĩnh vực của mình</p>
                <a href="#">Xem thêm</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-box">
                <i class="fas fa-tools"></i>
                <h3>Trang thiết bị hiện đại</h3>
                <p>Các sản phẩm chính hãng để sửa chữa và thay thế</p>
                <a href="#">Xem thêm</a>
            </div>
        </div>
    </div>
</section>

<section class="about-section container my-5">
    <div class="row">
        <div class="col-md-6">
            <div class="relative">
                <img src="https://storage.googleapis.com/a1aa/image/FtBJ3bUqrDmxHCZQALD3CKdYlts41YJFBF8O1dOJLPY.jpg" alt="A red sports car with a mechanic" class="img-responsive">
                <div class="absolute" style="top: 0; left: 0; background: #e74c3c; color: #fff; padding: 20px;">
                    <h3 style="font-size: 40px; font-weight: bold;">15</h3>
                    <p style="font-size: 18px;">Có nhiều năm kinh nghiệm</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>// Về chúng tôi //</h2>
            <h1>AUTOSHOWROOM là nơi để bạn trải nghiệm các dịch vụ liên quan đến xe</h1>
            <p>Lên lịch lái thử, bảo trì, sửa chữa, cứu hộ và các dịch vụ khác một cách dễ dàng với Xưởng dịch vụ AUTOSHOWROOM.</p>
            <ul>
                <li><span>01</span> <div><h3>Chuyên nghiệp & Chuyên gia</h3><p>Xử lý các nhu cầu của khách hàng một cách hoàn hảo, nhanh chóng</p></div></li>
                <li><span>02</span> <div><h3>Trung tâm dịch vụ chất lượng</h3><p>Nơi bạn có thể trải nghiệm các dịch vụ tốt nhất</p></div></li>
                <li><span>03</span> <div><h3>Hỗ trợ khách hàng 24/7</h3><p>Đội ngũ tư vấn và kỹ thuật luôn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi.</p></div></li>
                <li><span>04</span> <div><h3>Đổi mới công nghệ liên tục</h3><p>Ứng dụng các công nghệ hiện đại nhất để nâng cao trải nghiệm và hiệu quả dịch vụ.</p></div></li>
            </ul>
        </div>
    </div>
</section>

<section class="booking-section py-5">
    <div class="container">
        <div class="row">
            <!-- Giới thiệu -->
            <div class="col-md-6">
                <div class="content">
                    <h2>Nhà cung cấp dịch vụ sửa chữa ô tô đạt chứng nhận và giải thưởng</h2>
                    <p>Chúng tôi tự hào mang đến dịch vụ sửa chữa xe chất lượng cao với đội ngũ kỹ thuật viên chuyên nghiệp. Luôn sẵn sàng phục vụ, tận tâm với từng chiếc xe của bạn. Sự hài lòng của khách hàng là ưu tiên hàng đầu.</p>
                </div>
            </div>

            <!-- Form đặt dịch vụ -->
            <div class="col-md-6">
                <div class="form bg-light p-4 rounded shadow">
                    <h2>Đặt lịch dịch vụ</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                   
                    
                        <div class="form">
                            @if(Auth::check())
                            <form action="{{ route('service') }}" method="POST">
                                @csrf
                                <input type="text" name="ho_ten" placeholder="Họ và tên" class="form-control custom-input" required>
                                
                                <input type="email" name="email" placeholder="Email" class="form-control custom-input" required value="{{ Auth::user()->email }}">
                                

                                <select name="ma_loai" class="form-control custom-input" required>
                                    <option value="">-- Chọn loại dịch vụ --</option>
                                    @foreach ($dsdichvu as $loai)
                                        <option value="{{ $loai->ma_loai }}">{{ $loai->ten_loai }}</option>
                                    @endforeach
                                </select>

                                <input type="date" name="ngay_lap" class="form-control custom-input" required>
                                <textarea name="noi_dung" placeholder="Yêu cầu đặc biệt (nếu có)" class="form-control custom-input" rows="4"></textarea>

                                <button type="submit" class="btn btn-custom">ĐẶT LỊCH NGAY</button>
                            </form>
                            @else
                                <p class="text-danger">Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để đặt lịch dịch vụ.</p>
                            @endif
                        </div>
                  
           

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootsnav.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/service.js') }}"></script>
</body>
@endsection
