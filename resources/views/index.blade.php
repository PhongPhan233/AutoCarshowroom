@extends('layouts.app')
@section('content')
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

		<!-- <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet"> -->
        
        <!-- title of site -->
        <title>AutoShowroom</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <!-- <link rel="stylesheet" href="public/css/font-awesome.min.css"> -->

        <!-- linear icon css -->
<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">

<!-- flaticon.css -->
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

<!-- animate.css -->
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">

<!-- owl.carousel.css -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

<!-- bootstrap.min.css -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- bootsnav -->
<link rel="stylesheet" href="{{ asset('css/bootsnav.css') }}">	

<!-- style.css -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- responsive.css -->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

<!-- JavaScript -->
<script src="{{ asset('js/script.js') }}"></script>

<!-- Logo -->
<!-- <img src="{{ asset('images/logo.png') }}" alt="Logo"> -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
		<video autoplay muted loop playsinline class="bg-video">
        <source src="{{ asset('videos/auto_carshowroom.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
   
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="model-search-content">
							<div class="row">
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Năm</h2>
										<div class="model-select-icon">
											<select class="form-control">

											  	<option value="default">Năm</option><!-- /.option-->

											  	<option value="2018">2024</option><!-- /.option-->

											  	<option value="2017">2017</option><!-- /.option-->
											  	<option value="2016">2016</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>Kiểu dáng</h2>
										<div class="model-select-icon">
											<select class="form-control">

											  	<option value="default">Kiểu</option><!-- /.option-->

											  	<option value="sedan">sedan</option><!-- /.option-->

											  	<option value="van">van</option><!-- /.option-->
											  	<option value="roadster">roadster</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Hãng xe</h2>
										<div class="model-select-icon">
											<select class="form-control">

											  	<option value="default">Hãng</option><!-- /.option-->

											  	<option value="toyota">toyota</option><!-- /.option-->

											  	<option value="holden">holden</option><!-- /.option-->
											  	<option value="maecedes-benz">maecedes-benz.</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>Tình trạng</h2>
										<div class="model-select-icon">
											<select class="form-control">

											  	<option value="default">Tình trạng</option><!-- /.option-->

											  	<option value="something">something</option><!-- /.option-->

											  	<option value="something">something</option><!-- /.option-->
											  	<option value="something">something</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>Loại</h2>
										<div class="model-select-icon">
											<select class="form-control">

											  	<option value="default">Loại</option><!-- /.option-->

											  	<option value="kia-rio">kia-rio</option><!-- /.option-->

											  	<option value="mitsubishi">mitsubishi</option><!-- /.option-->
											  	<option value="ford">ford</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>Giá</h2>
										<div class="model-select-icon">
											<select class="form-control">

											  	<option value="default">Giá</option><!-- /.option-->

											  	<option value="$0.00">$0.00</option><!-- /.option-->

											  	<option value="$0.00">$0.00</option><!-- /.option-->
											  	<option value="$0.00">$0.00</option><!-- /.option-->

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-2 col-sm-12">
									<div class="single-model-search text-center">
										<button class="welcome-btn model-search-btn" onclick="window.location.href='#'">
											Tìm kiếm...
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--service start -->
		<section id="service" class="service">
			<div class="container">
				<div class="service-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car"></i>
								</div>
								<h2><a href="#">Dịch <span>vụ lái thử</span></a></h2>
								<p>
									Khách hàng có thể đặt lịch hẹn trước để lái thử xe.  
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car-repair"></i>
								</div>
								<h2><a href="#">Dịch <span>bảo trì & sửa chữa</span></a></h2>
								<p>
									Chuyên bảo dưỡng, thay thế, sửa chữa xe với các gói dịch vụ hấp dẫn.  
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car-1"></i>
								</div>
								<h2><a href="#">Dịch <span>hỗ trợ & cứu hộ</span></a></h2>
								<p>
									Hỗ trợ khách hàng mọi lúc mọi nơi 24/7 đồng hành cùng khách hàng. 
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>
		
		<section id="new-cars" class="new-cars">
			<div class="container">
				<div class="section-header">
					
					<h2>Các dòng xe mới nhất</h2>
				</div><!--/.section-header-->
				<div class="new-cars-content">
					<div class="owl-carousel owl-theme" id="new-cars-carousel">
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
										
											<img src={{ asset('images/new-cars-model/ncm1.png') }} alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#">chevrolet camaro <span> za100</span></a></h2>
											<p>
											Mẫu xe thể thao mang phong cách mạnh mẽ và đậm chất cơ bắp Mỹ, nổi bật với thiết kế hầm hố, hiệu suất cao và âm thanh động cơ đầy uy lực. Được sinh ra để chinh phục những tín đồ tốc độ, Camaro không chỉ là phương tiện di chuyển, mà còn là tuyên ngôn cá tính của người sở hữu. 
											</p>
											<p class="new-cars-para2">
											Lựa chọn hoàn hảo cho những ai yêu thích tốc độ, đam mê cảm giác lái mạnh mẽ và muốn khẳng định phong cách riêng.. 
											</p>
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												Chi tiết
											</button>
										</div><!--/.new-cars-txt-->	
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src={{ asset('images/new-cars-model/ncm2.png') }} alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#">BMW series-3 wagon</a></h2>
											<p>
											Lựa chọn lý tưởng cho những ai yêu thích cảm giác lái thể thao nhưng vẫn cần không gian rộng rãi và tiện nghi cho gia đình. Mang đến sự cân bằng hoàn hảo giữa phong cách, hiệu suất và sự linh hoạt hàng ngày. 
											</p>
											<p class="new-cars-para2">
											Lý tưởng cho các gia đình hiện đại, người yêu xe thể thao nhưng cần sự tiện dụng trong cuộc sống hằng ngày.
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												Chi tiết
											</button>
										</div><!--/.new-cars-txt-->	
									</div><!--/.col-->
								</div><!--/.row-->	
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src={{ asset('images/new-cars-model/ncm3.png') }} alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#">ferrari 488 superfast</a></h2>
											<p>
												Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
											</p>
											<p class="new-cars-para2">
												Sed ut pers unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. 
											</p>
											<button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
												Chi tiết
											</button>
										</div><!--/.new-cars-txt-->	
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
					</div><!--/#new-cars-carousel-->
				</div><!--/.new-cars-content-->
			</div><!--/.container-->

		</section><!--/.new-cars-->
		<!--new-cars end -->

		<!--featured-cars start -->
		<section id="featured-cars" class="featured-cars">
			<div class="container">
				<div class="section-header">
					
					<h2>Các dòng xe hiện có</h2>
				</div><!--/.section-header-->
				<div class="featured-cars-content">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src={{ asset('images/featured-cars/fc1.png') }} alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span> 
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">BMW 6-series gran coupe</a></h2>
									<h3>$89,395</h3>
									<p>
									Chiếc sedan hạng sang với thiết kế thể thao, nội thất cao cấp và động cơ mạnh mẽ, mang lại trải nghiệm lái êm ái và đẳng cấp. 
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src={{ asset('images/featured-cars/fc2.png') }} alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span> 
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">chevrolet camaro <span>wmv20</span></a></h2>
									<h3>$66,575</h3>
									<p>
									Dòng xe thể thao Mỹ với thiết kế cơ bắp, khả năng tăng tốc mạnh mẽ và cảm giác lái phấn khích trên mọi cung đường.

 
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src={{ asset('images/featured-cars/fc3.png') }} alt="cars">
									</div>
									<div class="featured-model-info">
										<p>
											model: 2017
											<span class="featured-mi-span"> 3100 mi</span> 
											<span class="featured-hp-span"> 240HP</span>
											 automatic
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#">lamborghini <span>v520</span></a></h2>
									<h3>$125,250</h3>
									<p>
									Siêu xe đến từ Ý với kiểu dáng hầm hố, động cơ cực mạnh và âm thanh động cơ đặc trưng khiến mọi ánh nhìn phải ngoái lại. 
									</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->

		

		<!--ds hãng xe -->
		<section id="brand"  class="brand">
			<div class="container">
				<div class="brand-area">
					<div class="owl-carousel owl-theme brand-item">
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/bmw-logo.jpg') }}" alt="brand-image">

							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/audi-logo.jpg') }}" alt="brand-image">
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/ford-logo.jpg') }}" alt="brand-image">
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/honda-logo.jpg') }}" alt="brand-image">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/hyundai-logo.jpg') }}" alt="brand-image">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/lexus-logo.jpg') }}" alt="brand-image">
							</a>
						</div>
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/mazda-logo.jpg') }}" alt="brand-image">
							</a>
						</div>
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/mercedes-benz-logo.jpg') }}" alt="brand-image">
							</a>
						</div>
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/porsche-logo.jpg') }}" alt="brand-image">
							</a>
						</div>
						<div class="item">
							<a href="#">
							<img src="{{ asset('images/brand/subaru-logo.jpg') }}" alt="brand-image">
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.clients-area-->

			</div><!--/.container-->

		</section><!--/brand-->	
		<!--brand end -->

		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

		<!--contact start-->
		
		<!--contact end-->


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<!-- jQuery -->
<script src="{{ asset('js/jquery.js') }}"></script>

<!-- Modernizr (CDN - không cần đổi) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Bootsnav -->
<script src="{{ asset('js/bootsnav.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- jQuery Easing (CDN - không cần đổi) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>

        
    </body>
	
</html>
@endsection