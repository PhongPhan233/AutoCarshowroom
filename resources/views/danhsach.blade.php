@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush

@section('content')

<section id="home" class="welcome-list">
    <div class="container">
        <div class="welcome-list-txt text-center">
            <h2>NHỮNG DÒNG XE MỚI & HIỆN ĐẠI NHẤT</h2>
            <p>Hãy tìm hiểu ngay với chúng tôi!</p>
            <button class="welcome-btn" onclick="window.location.href='#list-form'">Tìm hiểu</button>
        </div>
    </div>
</section>

<div class="search-form-container">
    <h2 class="search-title">Tìm kiếm xe phù hợp</h2>
    <div class="d-flex">
    <div class="search-fields-wrapper">
  <form class="search-form" role="form">
    <div class="row">

      <div class="col-xs-12 col-sm-6 col-md-4">
        <label for="hang">Hãng xe</label>
        <select id="hang" name="hang" class="form-control">
          <option value="">Hãng xe</option>
          @foreach ($dsHang as $hang)
            <option value="{{ $hang->ma_hang }}">{{ $hang->ten_hang }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <label for="dong">Dòng xe</label>
        <select id="dong" name="dong" class="form-control">
          <option value="">Dòng xe</option>
          @foreach ($dsDong as $dong)
            <option value="{{ $dong->ma_dongxe }}">{{ $dong->ten_dongxe }}</option>
          @endforeach
        </select>
      </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <label for="kieu">Kiểu xe</label>
        <select id="kieu" name="kieu" class="form-control">
          <option value="">Kiểu xe</option>
          @foreach ($dsKieu as $kieu)
            <option value="{{ $kieu->ma_kieu }}">{{ $kieu->ten_kieu }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <label for="loai">Loại xe</label>
        <select id="loai" name="loai" class="form-control">
          <option value="">Loại xe</option>
          @foreach ($dsLoai as $loai)
            <option value="{{ $loai->ma_loai }}">{{ $loai->ten_loai }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <label for="status2">Xuất xứ</label>
        <select id="status2" name="status2" class="form-control">
          <option value="">Xuất xứ</option>
          @foreach ($dsKieu as $kieu)
            <option value="{{ $kieu->ma_kieu }}">{{ $kieu->ten_kieu }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <label for="nam">NSX</label>
        <select id="nam" name="nam" class="form-control">
          <option value="">NSX</option>
          @foreach ($dsNSX as $nsx)
            <option value="{{ $nsx }}">{{ $nsx }}</option>
          @endforeach
        </select>
      </div>
        </div>
        </div>
        <div class="search-fields-wrapper2">
      <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-search"><i class="fas fa-search "></i>Tìm kiếm</button>
      </div>
        </div>
    </div>
  </form>
  
</div>





<div class="container">
    
    <div class="row">
    @foreach($dsXe as $xe)
        <div class="col-md-4 mb-4">
            <div class="car-hover-card">
                <img src="{{ asset(($xe->hinhanhXe->hinh_xe ?? 'images/cars/Dacia_SpringI_FL2024.jpg')) }}" alt="{{ $xe->ten_xe }}" class="car-img">

                <div class="car-basic-info">
                    <h4>{{ $xe->ten_xe }}</h4>
                    <p>{{ $xe->hangXe->ten_hang ?? 'Không rõ' }}</p>
                    <hr class="info-divider">
                </div>

           
                <div class="card-footer">
                    <div class="item"><i class="fas fa-road"></i> 2000 mi</div>
                    <div class="item"><i class="fas fa-cogs"></i> Automatic</div>
                    <div class="item"><i class="fas fa-tint"></i> 18/100</div>
                </div>

                <div class="car-overlay">
                    <div class="car-overlay-content">
                        <p>
                            Tên xe: {{ $xe->ten_xe ?? 'Không rõ' }}<br>
                            Hãng xe: {{ $xe->hangXe->ten_hang ?? 'Không rõ' }}<br>
                            Dòng xe: {{ $xe->dongXe->ten_dongxe ?? 'Không rõ' }}<br>
                            Kiểu xe: {{ $xe->kieuXe->ten_kieu ?? 'Không rõ' }}<br>
                            Loại xe: {{ $xe->loaiXe->ten_loai ?? 'Không rõ' }}<br>
                            Năm SX: {{ $xe->nsx }}
                        </p>
                        <a href="{{ route('xe.show', ['ma_xe' => $xe->ma_xe]) }}" class="btn-overlay">Khám phá</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



<div class="text-center">
    {!! $dsXe->links('vendor.pagination.bootstrap-3') !!}
</div>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/list.js') }}"></script>
@endpush