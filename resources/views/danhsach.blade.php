@extends('layouts.app')


@section('content')
@push('styles')
@endpush
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListCar</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 3 JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>
<body>
    <section id="home" class="welcome-list">
        <div class="container">

				<div class="welcome-list-txt">
					<h2>Những dòng xe mới & hiện đại nhất</h2>
					<p>
                    Hãy tìm hiểu ngay với chúng tôi! 
					</p>
					<button class="welcome-btn" onclick="window.location.href='#list-form'">Tìm hiểu</button>
				</div>
			</div>
    </section>
    <div class="container">
        <div class="row">
        <!-- BỘ LỌC -->
        <div class="col-md-3">
            <div class="filter-section">
                <h2>Bộ lọc</h2>
                <div class="filter-info">
                    <ul class="list-unstyled">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                Loại xe <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($loaixe as $loai)
                                    <li><a class="dropdown-item filter-option" href="#" data-type="loai" data-value="{{ $loai->ma_loai }}">{{ $loai->ten_loai }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                Kiểu xe <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($dskieuxe as $kieu)
                                    <li><a class="dropdown-item filter-option" href="#" data-type="kieu" data-value="{{ $kieu->ma_kieu }}">{{ $kieu->ten_kieu }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                Nội thất <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Da</a></li>
                                <li><a class="dropdown-item" href="#">Nỉ</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                Trang bị <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Tiện nghi</a></li>
                                <li><a class="dropdown-item" href="#">An toàn</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- DANH SÁCH XE -->
        <div class="col-md-9">
            <div class="search-bar mb-4 d-flex flex-wrap justify-content-end gap-2">
                <input type="text" class="form-control w-50" placeholder="Tìm kiếm xe...">
                <select class="form-control w-auto">
                    <option>Giá: thấp đến cao</option>
                    <option>Giá: cao đến thấp</option>
                </select>
            </div>

            <div class="row">
                @foreach($dsXe as $xe)
                <div class="col-md-4 d-flex">

                    <div class="car-card d-flex flex-column justify-content-between w-100">
                        <img src="{{ asset(($xe->hinhanhXe->hinh_xe ?? 'images/cars/Dacia_SpringI_FL2024.jpg'))}}" alt="{{ $xe->ten_xe }}">
                        
                        <h3>{{ $xe->ten_xe }}</h3>

                        <div class="details">
                            <p>
                                Kiểu xe: {{ $xe->kieuXe->ten_kieu ?? 'Không rõ' }} |
                                Loại xe: {{ $xe->loaiXe->ten_loai ?? 'Không rõ' }} |
                                Hãng xe: {{ $xe->hangXe->ten_hang ?? 'Không rõ' }}
                            </p>
                            <p>Năm sản xuất: {{ $xe->nsx }}</p>
                        </div>

                        <div class="price">
                            <span class="text-muted">Hãng xe: {{ $xe->hangXe->ten_hang ?? 'Không rõ' }}</span>
                        </div>

                        <a href="{{ route('xe.show', ['ma_xe' => $xe->ma_xe]) }}" class="btn-details mt-3">Chi tiết</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.filter-section ul li').on('click', function() {
                $(this).toggleClass('active');
            });
        });
    </script>


<script src="{{ asset('js/jquery.js') }}"></script>

<!-- Modernizr.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!-- Bootstrap.min.js -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Bootsnav.js -->
<script src="{{ asset('js/bootsnav.js') }}"></script>

<!-- Owl.carousel.js -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
</body>
		



@endsection