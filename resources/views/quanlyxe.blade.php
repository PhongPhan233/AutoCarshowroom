<html>
@if(Auth::user()->role == 'admin')
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

<body class="bg-[#f8fafc] text-[#1e293b]">
<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="fixed top-0 left-0 h-screen flex flex-col w-64 bg-white border-r border-gray-200 z-10">

    <div class="flex items-center gap-2 px-6 py-5 border-b">
      <img src="https://storage.googleapis.com/a1aa/image/5d846d91-c358-403c-ccba-483c07aa6240.jpg" alt="Logo" class="w-6 h-6">
      <a class="font-semibold text-base" href="{{ route('home') }}">Auto Carshowroom</a>
    </div>
    <nav class="flex-1 overflow-y-auto text-sm">
      <a href="{{  route ('admin') }}" class="flex items-center gap-2 px-6 py-3 text-[#3b82f6] bg-[#eff6ff] border-l-4 border-[#3b82f6] font-medium">
        <i class="fas fa-chart-line"></i> DANH SÁCH PHIẾU
      </a>
      <a href="{{  route ('quanlyxe') }}" class="flex items-center gap-2 px-6 py-3 text-[#3b82f6] bg-[#eff6ff] border-l-4 border-[#3b82f6] font-medium">
        <i class="fas fa-chart-line"></i> DANH SÁCH XE
      </a>
      <div class="px-6 pt-6 pb-2 text-xs font-semibold text-[#94a3b8] uppercase">QUẢN LÝ XE</div>
      <a href="#quanlyxe" class="flex items-center gap-2 px-6 py-2 hover:text-[#0f172a]"><i class="fas fa-font"></i> XE</a>

    </nav>
  </aside>

  <!-- Main content -->
  <!-- Main content -->
<div class="flex-1 flex flex-col ml-64">

    <!-- Top bar -->
    <header class="flex items-center justify-between px-6 py-3 border-b bg-white">
      <div class="flex items-center gap-4">
        <button aria-label="Menu" class="text-lg text-gray-500"><i class="fas fa-bars"></i></button>
        <input type="search" class="rounded border px-3 py-1 text-sm" placeholder="Search here...">
      </div>
      <div class="flex items-center gap-4 text-sm">
        <button aria-label="Messages" class="text-lg"><i class="far fa-envelope"></i></button>
        <img src="https://storage.googleapis.com/a1aa/image/7308d9a4-bd94-412f-fbe6-487c94da0fc9.jpg" alt="User" class="w-8 h-8 rounded-full">
        <span>Đăng xuất</span>
      </div>
    </header>

    <!-- Content area -->
   
    <main id="phieu" class="flex flex-col md:flex-row gap-6 p-6 overflow-auto">
      <section class="flex-1 flex flex-col gap-6">
        <h2 class="text-sm font-semibold">DANH SÁCH THÔNG TIN XE</h2>
        
        <div class="bg-white rounded-md border overflow-x-auto">
          <table class="w-full text-sm text-left">
            <thead class="text-xs font-semibold text-[#334155] border-b">
              <tr>
                <th class="px-6 py-3">MÃ XE</th>
                <th class="px-6 py-3">TÊN XE</th>
                <th class="px-6 py-3">HÃNG XE</th>
                <th class="px-6 py-3">DÒNG XE</th>
                <th class="px-6 py-3">KIỂU XE</th>
                <th class="px-6 py-3">LOẠI XE</th>
                <th class="px-6 py-3">NĂM SẢN XUẤT</th>
                <th class="px-6 py-3">MÔ TẢ</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dsXe as $xe)
                <tr class="border-b">
                  <td class="px-6 py-3">{{ $xe->ma_xe }}</td>
                  <td class="px-6 py-3">{{ $xe->ten_xe }}</td>
                  <td class="px-6 py-3">{{ $xe->hangXe->ten_hang }}</td>
                  <td class="px-6 py-3">{{ $xe->dongXe->ten_dongxe }}</td>
                  <td class="px-6 py-3">{{ $xe->kieuXe->ten_kieu }}</td>
                  <td class="px-6 py-3">{{ $xe->loaiXe->ten_loai }}</td>
                  <td class="px-6 py-3">{{ $xe->nsx }}</td>
                  <td class="px-6 py-3">{{ $xe->mo_ta }}</td>
                  
                  
                  <!-- </form> -->
                <td class="px-10 py-3">
            <div class="flex space-x-4">
                
                <a href="{{ route('xe.edit', $xe->ma_xe) }}" title="Cập nhật">
                    <button class="text-black hover:text-blue-700">
                        <i class="fa-solid fa-up-right-and-down-left-from-center fa-1x"></i>
                    </button>
                </a>
                <form action="{{ route('xe.destroy', $xe->ma_xe) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa xe này không?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-blue-700" title="Xóa">
                        <i class="fa-solid fa-trash fa-1x"></i>
                    </button>
                </form>
                <button class="text-blue hover:text-green-700" title="Chi tiết">
                <i class="fa-solid fa-chevron-right fa-1x"></i>
                </button>
            </div>
            </td>


                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <h2 class="text-sm font-semibold">Chi Tiết Xe</h2>
        <div id="chi-tiet-phieu" class="bg-white rounded-md p-4 min-h-[0px] border">
          <p class="text-xs text-[#64748b] mb-1">Chọn xe để xem chi tiết.</p>
        </div>
        <div class="bg-white p-6 rounded-md shadow-md border w-full mt-[500px]">

    <h2  id = "quanlyxe" class="text-xl font-semibold mb-4">Thêm Xe Mới</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('xe.store') }}" method="POST"  enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div>
                <label class="block text-sm font-medium mb-1">Tên xe</label>
                <input type="text" name="ten_xe" value="{{ old('ten_xe') }}" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Loại xe</label>
                <select name="ma_loai" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                    @foreach($loaixe as $loai)
                        <option value="{{ $loai->ma_loai }}">{{ $loai->ten_loai }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Kiểu xe</label>
                <select name="ma_kieu" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                    @foreach($dskieuxe as $kieu)
                        <option value="{{ $kieu->ma_kieu }}">{{ $kieu->ten_kieu }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Hãng xe</label>
                <select name="ma_hang" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                    @foreach($hangxe as $hang)
                        <option value="{{ $hang->ma_hang }}">{{ $hang->ten_hang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Dòng Xe</label>
                <select name="ma_dongxe" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                    @foreach($dongxe as $dong)
                      
                        <option value="{{ $dong->ma_dongxe }}">{{ $dong->ten_dongxe}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Năm sản xuất</label>
                <input type="number" name="nsx" value="{{ old('nsx') }}" min="1900" max="{{ date('Y') }}"required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div type="hidden">
              <input type="hidden" name="ma_xe" value="{{ $xe->ma_xe }}">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-1">Mô tả</label>
                <textarea name="mo_ta" rows="3"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">{{ old('mo_ta') }}</textarea>
            </div>
            <div>
              <label>Chọn ảnh bìa xe:</label>
              <input type="file" name="hinh_anh" accept=".jpg,.jpeg,.png" required>
            </div>
            <div>
              <label>Chọn ảnh mặt trước của xe:</label>
              <input type="file" name="mat_truoc" accept=".jpg,.jpeg,.png">
            </div>
            <div>
              <label>Chọn ảnh mặt sau của xe:</label>
              <input type="file" name="mat_sau" accept=".jpg,.jpeg,.png">
            </div>
            <div>
              <label>Chọn ảnh mặt bên của xe:</label>
              <input type="file" name="mat_ben" accept=".jpg,.jpeg,.png">
            </div>
            <div>
              <label>Chọn ảnh file 3D của xe (glb):</label>
              <input type="file" name="view_3D" accept=".glb">
            </div>
            <div>
              
              <label>Chọn folder chứa ảnh 360 (.jpg và  được đánh số từ 01-31):</label>
              <input type="file" name="images[]" webkitdirectory directory multiple>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tổng chiều dài</label>
                <input type="number" step="any" name="tong_chieu_dai" value="{{ old('tong_chieu_dai') }}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Chiều rộng tổng thể</label>
                <input type="number" step="any" name="chieu_rong_tong_the" value="{{ old('chieu_rong_tong_the') }}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Chiều cao tổng thể</label>
                <input type="number" step="any" name="chieu_cao_tong_the" value="{{ old('chieu_cao_tong_the') }}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Khoảng sáng gầm xe</label>
                <input type="number" step="any" name="khoang_sang_gam_xe" value="{{ old('khoang_sang_gam_xe') }}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Bán kính</label>
                <input type="number" step="any" name="ban_kinh" value="{{ old('ban_kinh') }}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Vận tốc tối đa</label>
                <input type="number" step="any" name="van_toc_toi_da" value="{{ old('van_toc_toi_da') }}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Động cơ</label>
                <input type="text" name="dong_co" value="{{old('dong_co','Tên dộng cơ')}}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Khối lượng</label>
                <input type="number" step="any" name="khoi_luong" value="{{old('khoi_luong')}}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Dung tích nhiên liệu</label>
                <input type="number" step="any" name="dung_tich_nhien_lieu" value="{{old('dung_tich_nhien_lieu')}}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Dung tích khoang hành lý</label>
                <input type="number" step="any" name="dung_tich_khoang_hanh_ly" value="{{old('dung_tich_khoang_hanh_ly')}}" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Thêm Xe
            </button>
        </div>
    </form>
</div>



<!-- 'dung_tich_nhien_lieu', 'dung_tich_khoang_hanh_ly' -->
      </section>

  
    </main>
    
  </div>
  
</div>



<script src="{{ asset('js/admin.js') }}"></script>
</body>
@else 
  <h1> Bạn không có quyền truy cập vào trang này. Vui lòng thử lại</h1>

@endif
</html>
