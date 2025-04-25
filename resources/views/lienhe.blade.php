@extends('layouts.app')
<html>
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>AutoShowroom</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="{{ asset('logo/favicon.png') }}"/>

<!-- font-awesome.min.css -->
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

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
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<!-- responsive.css -->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<section id="home" class="welcome-contact">
<div class="container">

				<div class="welcome-contact-txt">
					<h2>Nhận tư vấn và hỗ trợ miễn phí</h2>
					<p>
                    Lựa chọn xế hộp cho gia đình bạn ngay bây giờ! 
					</p>
					<button class="welcome-btn" onclick="window.location.href='#contact-form'">Liên hệ</button>
				</div>
			</div>



	<div class="contact-container">
        <!-- Contact Form -->
        <div class="contact-form">
            <section id = "contact-form">
            <h2>Hãy liên hệ với chúng tôi</h2>
            <form>
                <label for="email">
                    <i class=""></i>Email
                </label>
                <input type="email" id="email" placeholder="Nhập địa chỉ email">
                <label for="message">Bạn cần giúp gì?</label>
                <textarea id="message" rows="5" placeholder="Chúng tôi có thể giúp gì cho bạn?"></textarea>
                <button class = "contact-button"type="submit">SUBMIT</button>
            </form>
            </section>
        </div>
        <!-- Contact Information -->
        <div class="contact-info">
            <div>
                <h3><i class="fas fa-map-marker-alt"></i> Địa chỉ</h3>
                <p>Khu Công nghệ cao TP.HCM (SHTP), Xa lộ Hà Nội, P. Hiệp Phú, TP. Thủ Đức, TP.HCM</p>
            </div>
            <div>
                <h3><i class="fas fa-phone-alt"></i> Hãy liên hệ</h3>
                <p><a href="tel:+18001236879">+1 800 1236879</a></p>
            </div>
            <div>
                <h3><i class="fas fa-envelope"></i> Hỗ trợ mua bán</h3>
                <p><a href="mailto:contact@example.com">autoShowroom@gmail.com</a></p>
            </div>
        </div>
    </div>
    </section>
        </body>
  
</html>
		</body>
		</html>	
				</div>
			</div><!--/.container-->

		</section><!--/.featured-cars-->
    </div>
    <!-- jQuery -->
<script src="{{ asset('js/jquery.js') }}"></script>

<!-- Modernizr (CDN) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Bootsnav -->
<script src="{{ asset('js/bootsnav.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- jQuery Easing (CDN) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
</body>
@endsection
</html>
