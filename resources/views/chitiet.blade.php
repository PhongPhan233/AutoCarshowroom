@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/car360.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    
    
    <script src="{{ asset('js/car360.js') }}"></script>
@endpush

@section('content')
<script>
    window.carImageBasePath = "{{ asset($xe->xe360->view) }}";
</script>
<div class="main-content">
<div class="viewer-container">
<div class="product-title">
    {{ $xe->ten_xe }}
    <button id="play-stop-btn" class="btn-playstop" type="button" aria-label="Play or Stop">
    <i class="fas fa-play"></i><span> PLAY</span>
</button>

    <div class="product-subtitle"><li>{{$xe->hangXe->ten_hang ?? null}} | {{$xe->kieuXe->ten_kieu ?? null }} | {{$xe->loaiXe->ten_loai ?? null}} | {{$xe->xe->ma_xe ?? null}} </li></div>
  </div>
    <div class="viewer" id="viewer"></div>
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

    
</div>

<div id="product-details" class="product-details">
    <h2>{{$xe->ten_xe ?? null}}</h2>
    <div class="details-container">
        <div class="vehicle-images">
        <div class="viewer-container text-center mt-4">
    <button id="toggle-3d-view" class="btn btn-primary">
        <i class="fas fa-cube"></i> Xem mô hình 3D
    </button>
</div>

<!-- Khung hiển thị mô hình 3D -->
<div id="model-viewer-container" class="text-center" style="margin-top: 20px; display: none;">
    <model-viewer
        id="car-3d-model"
        src="{{ asset('models/2018_bmw_m5.glb') }}"
        alt="3D Xe BMW"
        auto-rotate
        camera-controls
        ar
        style="width: 100%; max-width: 900px; height: 500px; margin: auto;">
    </model-viewer>
</div>
        
        <img src="{{ asset(($xe->hinhanhXe->mat_ben ?? 'images/car360/Mercedes/Mercedes_SZ223/01.jpg')) }}" alt="Side View" class="product-side">

            <div class="multi-view">
            <!-- <img src="{{ asset('images/car360/Mercedes/Mercedes_SZ223/10.jpg') }}" alt="Front View"> -->
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
                    <li>Rộng: {{$xe->thongSoKyThuat->chieu_rong_tong_the}} mm</li>
                    <li>Cao: {{$xe->thongSoKyThuat->tong_chieu_dai}} mm</li>
                    <li>Khoảng sáng gầm: {{$xe->thongSoKyThuat->khoang_sang_gam_xe}} mm</li>
                    <li>Bán kính: {{$xe->thongSoKyThuat->ban_kinh}} mm</li>
                    <li>Vận tốc tối đa: {{$xe->thongSoKyThuat->van_toc_toi_da}} km/h</li>
                    <li>Động cơ: {{$xe->thongSoKyThuat->dong_co}}</li>
                    <li>Khối lượng: {{$xe->thongSoKyThuat->dong_co}}</li>
                    <li>Dung tích: {{$xe->dungtich->dung_tich_nhien_lieu}}</li>
                    <li>Dung tích khoang hành lý: {{$xe->dungtich->dung_tich_khoang_hanh_ly}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggle-3d-view');
        const viewer = document.getElementById('model-viewer-container');

        toggleBtn.addEventListener('click', () => {
            viewer.style.display = viewer.style.display === 'none' ? 'block' : 'none';
            toggleBtn.innerHTML = viewer.style.display === 'block' 
                ? '<i class="fas fa-times"></i> Đóng mô hình 3D' 
                : '<i class="fas fa-cube"></i> Xem mô hình 3D';
        });
    });
</script>
@endpush
@endsection
