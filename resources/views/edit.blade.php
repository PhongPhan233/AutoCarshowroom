@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Chỉnh sửa xe: {{ $xe->ten_xe }}</h2>

    <form action="{{ route('xe.update', $xe->ma_xe) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ten_xe">Tên xe</label>
            <input type="text" name="ten_xe" class="form-control" value="{{ old('ten_xe', $xe->ten_xe) }}" required>
        </div>

        <div class="form-group">
            <label for="ma_loai">Loại xe</label>
            <select name="ma_loai" class="form-control" required>
                @foreach ($loai_xe as $loai)
                    <option value="{{ $loai->ma_loai }}" {{ $xe->ma_loai == $loai->ma_loai ? 'selected' : '' }}>{{ $loai->ten_loai }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ma_kieu">Kiểu xe</label>
            <select name="ma_kieu" class="form-control" required>
                @foreach ($kieu_xe as $kieu)
                    <option value="{{ $kieu->ma_kieu }}" {{ $xe->ma_kieu == $kieu->ma_kieu ? 'selected' : '' }}>{{ $kieu->ten_kieu }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ma_hang">Hãng xe</label>
            <select name="ma_hang" class="form-control" required>
                @foreach ($hang_xe as $hang)
                    <option value="{{ $hang->ma_hang }}" {{ $xe->ma_hang == $hang->ma_hang ? 'selected' : '' }}>{{ $hang->ten_hang }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nsx">Năm sản xuất</label>
            <input type="date" name="nsx" class="form-control" value="{{ old('nsx', $xe->nsx) }}" required>
        </div>

        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea name="mo_ta" class="form-control">{{ old('mo_ta', $xe->mo_ta) }}</textarea>
        </div>

        <div class="form-group">
            <label>Ảnh mặt trước</label><br>
            @if($xe->hinhAnh && $xe->hinhAnh->mat_truoc)
                <img src="{{ asset($xe->hinhAnh->mat_truoc) }}" width="100"><br>
            @endif
            <input type="file" name="mat_truoc" class="form-control-file">
        </div>

        <div class="form-group">
            <label>Ảnh mặt bên</label><br>
            @if($xe->hinhAnh && $xe->hinhAnh->mat_ben)
                <img src="{{ asset($xe->hinhAnh->mat_ben) }}" width="100"><br>
            @endif
            <input type="file" name="mat_ben" class="form-control-file">
        </div>

        <div class="form-group">
            <label>Ảnh mặt sau</label><br>
            @if($xe->hinhAnh && $xe->hinhAnh->mat_sau)
                <img src="{{ asset($xe->hinhAnh->mat_sau) }}" width="100"><br>
            @endif
            <input type="file" name="mat_sau" class="form-control-file">
        </div>

        <div class="form-group">
            <label>File 3D (.glb)</label><br>
            @if($xe->car360)
                <a href="{{ asset($xe->car360->file) }}" target="_blank">Xem hiện tại</a><br>
            @endif
            <input type="file" name="glb_file" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('xe.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
