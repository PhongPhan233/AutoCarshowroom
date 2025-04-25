@extends('layouts.app')

@push('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.css">
    <style>
        #viewer {
            width: 600px;
            height: 400px;
            margin: auto;
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery trước -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>window.jQuery = window.$ = jQuery;</script>

    <!-- SpriteSpin sau jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

    <!-- Script khởi tạo SpriteSpin -->
    <script>
        $(document).ready(function () {
            if ($('#viewer').length) {
                const frames = [];
                for (let i = 1; i <= 31; i++) {
                    frames.push(`/images/car360/Mercedes/Mercedes_SZ223/${String(i).padStart(2, '0')}.jpg`);
                }

                $("#viewer").spritespin({
                source: frames,
                width: 600,
                height: 400,
                sense: -1,
                frameTime: 60,
                animate: false,
                loop: true, // thử đặt loop thành true
            });
            }
        });

        // Scroll mượt
        function scrollToDetails() {
            document.getElementById("product-details").scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    </script>
@endpush

@section('content')
<div class="main-content">
    <div class="product-main">
        <div id="viewer"></div>
    </div>

    <p class="product-type">Furgon [16-]</p>

    <div class="scroll-down" onclick="scrollToDetails()">
        <p>More Info</p>
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<div id="product-details" class="product-details">
    <h2>Volkswagen Crafter Specs</h2>
    <div class="details-container">
        <div class="vehicle-images">
            <img src="https://flib.carshow360.net/900/800/944878de4c2114665cb.webp" alt="Side View" class="product-side">
            <div class="multi-view">
                <img src="https://flib.carshow360.net/900/900/944902103d13db89857b.webp" alt="Front View">
                <img src="https://flib.carshow360.net/900/800/944886f73c9143bfa35b.webp" alt="Rear View">
            </div>
        </div>
        <div class="specifications">
            <div class="details-info">
                <h3>Thông số kỹ thuật</h3>
                <ul>
                    <li>Body Type: Van</li>
                    <li>Số cửa: 4</li>
                    <li>Số chỗ: 3</li>
                    <li>Dài: 5986 mm</li>
                    <li>Rộng: 2040 mm</li>
                    <li>Cao: 2355 mm</li>
                    <li>Chiều dài cơ sở: 3640 mm</li>
                    <li>Khoảng sáng gầm: 195 mm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
