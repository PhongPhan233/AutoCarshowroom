@extends('layouts.app')

@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auto Carshowroom Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body>
<div class="container" style="margin-top: 200px ;">
    <h2>Sửa thông tin xe</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('xe.update', $xe->ma_xe) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
        <div>
            <label class="block text-sm font-medium mb-1">Tên xe</label>
            <input type="text" name="ten_xe" value="{{ old('ten_xe', $xe->ten_xe) }}"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Loại xe</label>
            <select name="ma_loai" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @foreach($loaixe as $loai)
                    <option value="{{ $loai->ma_loai }}" {{ $xe->ma_loai == $loai->ma_loai ? 'selected' : '' }}>
                        {{ $loai->ten_loai }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Kiểu xe</label>
            <select name="ma_kieu" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @foreach($dskieuxe as $kieu)
                    <option value="{{ $kieu->ma_kieu }}" {{ $xe->ma_kieu == $kieu->ma_kieu ? 'selected' : '' }}>
                        {{ $kieu->ten_kieu }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Hãng xe</label>
            <select name="ma_hang" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @foreach($hangxe as $hang)
                    <option value="{{ $hang->ma_hang }}" {{ $xe->ma_hang == $hang->ma_hang ? 'selected' : '' }}>
                        {{ $hang->ten_hang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Dòng xe</label>
            <select name="ma_dongxe" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                @foreach($dongxe as $dong)
                    <option value="{{ $dong->ma_dongxe }}" {{ $xe->ma_dongxe == $dong->ma_dongxe ? 'selected' : '' }}>
                        {{ $dong->ten_dongxe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Năm sản xuất</label>
            <input type="number" name="nsx" value="{{ old('nsx', $xe->nsx) }}" min="1900" max="{{ date('Y') }}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium mb-1">Mô tả</label>
            <textarea name="mo_ta" rows="3"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">{{ old('mo_ta', $xe->mo_ta) }}</textarea>
        </div>

        <div>
            <label>Ảnh bìa xe (nếu muốn thay):</label>
            <input type="file" name="hinh_anh" accept=".jpg,.jpeg,.png">
        </div>
        <div>
            <label>Ảnh mặt trước (nếu muốn thay):</label>
            <input type="file" name="mat_truoc" accept=".jpg,.jpeg,.png">
        </div>
        <div>
            <label>Ảnh mặt sau (nếu muốn thay):</label>
            <input type="file" name="mat_sau" accept=".jpg,.jpeg,.png">
        </div>
        <div>
            <label>Ảnh mặt bên (nếu muốn thay):</label>
            <input type="file" name="mat_ben" accept=".jpg,.jpeg,.png">
        </div>
        <div>
            <label>File 3D (.glb) (nếu muốn thay):</label>
            <input type="file" name="view_3D" accept=".glb">
        </div>
        <div>
            <label>Thư mục ảnh 360 (nếu muốn thay toàn bộ):</label>
            <input type="file" name="images[]" webkitdirectory directory multiple>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tổng chiều dài</label>
            <input type="number" step="any" name="tong_chieu_dai" value="{{ old('tong_chieu_dai',$xe->thongSoKyThuat->tong_chieu_dai ?? '0') }}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Chiều rộng tổng thể</label>
            <input type="number" step="any" name="chieu_rong_tong_the" value="{{ old('chieu_rong_tong_the',$xe->thongSoKyThuat->chieu_rong_tong_the ?? '0') }}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Chiều cao tổng thể</label>
            <input type="number" step="any" name="chieu_cao_tong_the" value="{{ old('chieu_cao_tong_the', $xe->thongSoKyThuat->chieu_cao_tong_the ?? '0') }}" 
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Khoảng sáng gầm xe</label>
            <input type="number" step="any" name="khoang_sang_gam_xe" value="{{ old('khoang_sang_gam_xe',$xe->thongSoKyThuat->khoang_sang_gam_xe ?? '0') }}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Bán kính</label>
            <input type="number" step="any" name="ban_kinh" value="{{ old('ban_kinh',$xe->thongSoKyThuat->ban_kinh ?? '0') }}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Vận tốc tối đa</label>
            <input type="number" step="any" name="van_toc_toi_da" value="{{ old('van_toc_toi_da',$xe->thongSoKyThuat->van_toc_toi_da ?? '0') }}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Động cơ</label>
            <input type="text" name="dong_co" value="{{old('dong_co',$xe->thongSoKyThuat->dong_co ?? 'Không có dữ liệu')}}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Khối lượng</label>
            <input type="number" step="any" name="khoi_luong" value="{{old('khoi_luong',$xe->thongSoKyThuat->khoi_luong ?? '0')}}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Dung tích nhiên liệu</label>
            <input type="number" step="any" name="dung_tich_nhien_lieu" value="{{old('dung_tich_nhien_lieu',$xe->dungtich->dung_tich_nhien_lieu ?? '0')}}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Dung tích khoang hành lý</label>
            <input type="number" step="any" name="dung_tich_khoang_hanh_ly" value="{{old('dung_tich_khoang_hanh_ly',$xe->dungtich->dung_tich_khoang_hanh_ly ?? '0')}}" 
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
        </div>
    </div>

    <div class="mt-6">
        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
            Cập nhật Xe
        </button>
    </div>
</form>

</div>
</body>
<script src="{{ asset('js/admin.js') }}"></script>
@endsection