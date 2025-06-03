@extends('layouts.app')

@push('styles')
        
    <link rel="stylesheet" href="{{ asset('css/car360.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.142.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.142.0/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.142.0/examples/js/controls/OrbitControls.js"></script> <!-- OrbitControls -->
    <script src="{{ asset('js/car360.js') }}"></script>
    <script src="{{ asset('js/car3D.js') }}"></script>



@endpush

@section('content')
<div id="3d-container" data-model-url="{{ asset($xe->xe360->view_3D) }}" style="width: 100%; height: 100vh; display: none;"></div>



<script>
    window.carImageBasePath = "{{ asset($xe->xe360->view) }}";
</script>

<div class="main-content">



    <div class="viewer-container">
        
    <div class="sidebar">
    <button id="btn360" aria-label="360 view" title="360 view" style="padding:0;">
    <span class="glyphicon glyphicon-facetime-video"></span>
    </button>

    

    <button id="btnzoom" aria-label="Zoom" title="Zoom" class="zoom">
      <i class="fas fa-search-plus"></i>
    </button>
    <button aria-label="Settings" title="Settings">
      <i class="fas fa-sliders-h"></i>
    </button>

    <div class="bottom-buttons" style="display:flex; flex-direction: column; align-items:center;">
      <button aria-label="Steering wheel" title="Steering wheel" style="margin-bottom:18px;">
        <i class="fas fa-steering-wheel"></i>
      </button>
      <button id = "back-btn" class="bottom-buttons" aria-label="Settings gear" title="Settings gear">
        <i class="fa-solid fa-house"></i>
      </button>
    </div>
  </div>
        <div class="product-title">
            {{ $xe->ten_xe }}
            <button id="play-stop-btn" class="btn-playstop" type="button" aria-label="Play or Stop">
                <i class="fas fa-play"></i><span> PLAY</span>
            </button>
            <div id="3d-container" data-model-url="model-url.glb" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; z-index:10000; background:#fdfdfd;"></div>

            <button id="show-3d-btn" class="btn-playstop" type="button">
        <i class="fa-solid fa-cubes"></i><span>MÔ HÌNH 3D</span>
       
    </button>            
            <div class="product-subtitle">
                <li>{{$xe->hangXe->ten_hang ?? null}} | {{$xe->dongXe->ten_dongxe ?? null }} | {{$xe->kieuXe->ten_kieu ?? null }} | {{$xe->loaiXe->ten_loai ?? null}} | {{$xe->xe->ma_xe ?? null}} </li>
            </div>
        </div>
        <div class="viewer" style="display: block; margin: auto;" id="viewer"></div>
        <div id="zoomed-image" style="display: none; text-align: center; margin-top: 20px;">
            <img src="{{ asset(($xe->mo_rong . '/anhXe.jpg' ?? $xe->hinhanhXe->hinh_xe )) }}" alt="Zoomed Car" style="max-width: 100%; max-height: 800px;">
            <button class="hotspot hotspot1" aria-label="Hotspot 1" data-img="{{ asset(($xe->mo_rong ?? 'images/car360/Mercedes/Mercedes_SZ223') . '/01.jpg')}}" title="Hotspot 1">+</button>
            <button class="hotspot hotspot2" aria-label="Hotspot 2" data-img="{{ asset(($xe->mo_rong ?? 'images/car360/Mercedes/Mercedes_SZ223') . '/02.jpg')}}" title="Hotspot 2">+</button>
            <button class="hotspot hotspot3" aria-label="Hotspot 3" data-img="{{ asset(($xe->mo_rong ?? 'images/car360/Mercedes/Mercedes_SZ223') . '/03.jpg')}}" title="Hotspot 3">+</button>
            <button class="hotspot hotspot4" aria-label="Hotspot 4" data-img="{{ asset(($xe->mo_rong ?? 'images/car360/Mercedes/Mercedes_SZ223') . '/04.jpg')}}" title="Hotspot 4">+</button>
            <button class="hotspot hotspot5" aria-label="Hotspot 5" data-img="{{ asset(($xe->mo_rong ?? 'images/car360/Mercedes/Mercedes_SZ223') . '/05.jpg')}}" title="Hotspot 5">+</button>
            <button class="hotspot hotspot6" aria-label="Hotspot 6" data-img="{{ asset(($xe->mo_rong ?? 'images/car360/Mercedes/Mercedes_SZ223') . '/06.jpg')}}" title="Hotspot 6">+</button>
        </div>
        <div id="popup-image" style="display: none;">
            <div id="popup-overlay"></div>
            <div id="popup-content">
                <span id="popup-close">&times;</span>
                <img id="popup-img" src="" alt="Hotspot Image">
            </div>
        </div>
        <div class="scroll-down" onclick="scrollToDetails()">
            <p>Xem thêm</p>
            <i class="fas fa-chevron-down"></i>
        </div>
        
        <div class="zoom-controls">
            <button type="button" aria-label="Zoom in">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" aria-label="Zoom out">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
</div>

<div id="product-details" class="product-details">
    <h2>{{$xe->ten_xe ?? null}}</h2>
    <div class="details-container">
        <div class="vehicle-images">
            
            <img src="{{ asset(($xe->hinhanhXe->mat_ben ?? 'images/car360/Mercedes/Mercedes_SZ223/10.jpg'))}}" alt="Side View" class="product-side">

            <div class="multi-view">
                
                <img src="{{ asset(($xe->hinhanhXe->mat_truoc ?? 'images/car360/Mercedes/Mercedes_SZ223/10.jpg'))}}" alt="Front View">
                <img src="{{ asset(($xe->hinhanhXe->mat_sau ?? 'images/car360/Mercedes/Mercedes_SZ223/16.jpg')) }}" alt="Rear View">
            </div>
            </div>
        <div class="specifications">
            <div class="details-info">
                <h3>Thông số kỹ thuật</h3>
                <ul>
                    <li>Body Type: {{$xe->kieuXe->ten_kieu ?? null}}</li>
                    <li>Số cửa: {{$xe->ngoaihinh->so_cua ?? null}}</li>
                    <li>Số ghế: {{$xe->ngoaihinh->so_ghe ?? null}}</li>
                    <li>Màu sắc: {{$xe->ngoaihinh->mau_sac ?? null}}</li>
                    <li>Dài: {{$xe->thongSoKyThuat->tong_chieu_dai ?? null}} mm</li>
                    <li>Rộng: {{$xe->thongSoKyThuat->chieu_rong_tong_the ?? null}} mm</li>
                    <li>Cao: {{$xe->thongSoKyThuat->tong_chieu_cao ?? null}} mm</li>
                    <li>Khoảng sáng gầm: {{$xe->thongSoKyThuat->khoang_sang_gam_xe ?? null}} mm</li>
                    <li>Bán kính: {{$xe->thongSoKyThuat->ban_kinh ?? null}} mm</li>
                    <li>Vận tốc tối đa: {{$xe->thongSoKyThuat->van_toc_toi_da ?? null}} km/h</li>
                    <li>Động cơ: {{$xe->thongSoKyThuat->dong_co ?? null}}</li>
                    <li>Khối lượng: {{$xe->thongSoKyThuat->khong_luong ?? null}}</li>
                    <li>Dung tích: {{$xe->dungtich->dung_tich_nhien_lieu ?? null}}</li>
                    <li>Dung tích khoang hành lý: {{$xe->dungtich->dung_tich_khoang_hanh_ly ?? null}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection