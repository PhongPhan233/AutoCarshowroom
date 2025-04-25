@extends('layouts.app')
@section('content')	
<link rel="icon" type="image/png" href="{{ asset('images/icon.jpg') }}"/>

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{ asset('images/welcome-hero/welcome-banner.jpg') }}" alt="Banner 1">
      <div class="carousel-caption">
        <h3>2025 INFINITI QX60</h3>
        <p>Lease from 0% for 36 months</p>
        <a href="#" class="btn btn-default">Shop Now</a>
      </div>
    </div>

    <div class="item">
      <img src="images/banner2.jpg" alt="Banner 2">
      <div class="carousel-caption">
        <h3>Accelerate Into Spring</h3>
        <p>Without New Tariffs</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

</section>	
	
		

	

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

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

<script src="{{ asset('js/main.js') }}"></script>


</body>
@endsection
</html>