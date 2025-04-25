@extends('layouts.app')

<!DOCTYPE html>
<html lang="vi">
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Lái Thử</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <style>
        c.body {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            background-color: #f7f7f7;
            padding-top: 100px;
        }
    </style>
</head>
<c>
    <body>
        <div class="w-full max-w-lg form-container">
            <h1 class="text-2xl font-bold text-center mb-6 text-blue-800">ĐĂNG KÝ LÁI THỬ</h1>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1" for="name">Họ và tên *</label>
                    <input type="text" id="name" class="input-field" placeholder="Nhập họ và tên" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1" for="phone">Số điện thoại *</label>
                    <input type="tel" id="phone" class="input-field" placeholder="Nhập số điện thoại" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1" for="car">Tên xe *</label>
                    <input type="text" id="car" class="input-field" placeholder="Nhập tên xe" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1" for="city">Tỉnh/Thành phố *</label>
                    <select id="city" class="input-field" required>
                        <option value="">Chọn tỉnh/thành phố</option>
                        <option value="An Giang">An Giang</option>
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1" for="date">Ngày dự kiến *</label>
                    <input type="date" id="date" class="input-field" required>
                </div>
                <div class="space-y-2">
                    <div class="checkbox-label">
                        <input type="checkbox" id="license" class="w-5 h-5">
                        <label for="license" class="text-sm">Tôi đã có Giấy Phép Lái Xe hợp lệ</label>
                    </div>
                    <div class="checkbox-label">
                        <input type="checkbox" id="confirm" class="w-5 h-5">
                        <label for="confirm" class="text-sm">Tôi đồng ý nhận thông tin từ đại lý Hyundai.</label>
                    </div>
                    <div class="checkbox-label">
                        <input type="checkbox" id="agree" class="w-5 h-5">
                        <label for="agree" class="text-sm">Tôi đã đọc và đồng ý với các quy định và chính sách của Hyundai Việt Nam.</label>
                    </div>
                </div>
                <button type="submit" class="w-full submit-btn">ĐĂNG KÝ LÁI THỬ</button>
            </form>
        </div>
        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <script>
            $(".js-select2").each(function(){
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            })
        </script>
    <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/slick/slick.min.js"></script>
        <script src="js/slick-custom.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/parallax100/parallax100.js"></script>
        <script>
            $('.parallax100').parallax100();
        </script>
    <!--===============================================================================================-->
        <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
        <script>
            $('.gallery-lb').each(function() { // ảnh bìa
                $(this).magnificPopup({
                    delegate: 'a', // ảnh được chọn
                    type: 'image',
                    gallery: {
                        enabled:true
                    },
                    mainClass: 'mfp-fade'
                });
            });
        </script>
    <!--===============================================================================================-->
        <script src="vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/sweetalert/sweetalert.min.js"></script>
        <script>
            $('.js-addwish-b2').on('click', function(e){
                e.preventDefault();
            });

            $('.js-addwish-b2').each(function(){
                var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");

                    $(this).addClass('js-addedwish-b2');
                    $(this).off('click');
                });
            });

            $('.js-addwish-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");

                    $(this).addClass('js-addedwish-detail');
                    $(this).off('click');
                });
            });

            /*---------------------------------------------*/

            $('.js-addcart-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
        
        </script>
    <!--===============================================================================================-->
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
                })
            });
        </script>
    <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>
</c>
@endsection
</html>