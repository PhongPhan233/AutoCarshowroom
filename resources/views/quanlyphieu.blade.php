<html>
@if(Auth::user()->role == 'admin')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auto Carshowroom Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-[#f8fafc] text-[#1e293b]">
<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="flex flex-col w-64 bg-white border-r border-gray-200">
    <div class="flex items-center gap-2 px-6 py-5 border-b">
      <img src="https://storage.googleapis.com/a1aa/image/5d846d91-c358-403c-ccba-483c07aa6240.jpg" alt="Logo" class="w-6 h-6">
      <a class="font-semibold text-base" href="{{ route('home') }}">Auto Carshowroom</a>
    </div>
    <nav class="flex-1 overflow-y-auto text-sm">
      <a href="{{  route ('admin') }}" class="flex items-center gap-2 px-6 py-3 text-[#3b82f6] bg-[#eff6ff] border-l-4 border-[#3b82f6] font-medium">
        <i class="fas fa-chart-line"></i> DANH SÁCH PHIẾU
      </a>
      <a href="{{  route ('quanlyxe') }}" class="flex items-center gap-2 px-6 py-3 text-[#3b82f6] bg-[#eff6ff] border-l-4 border-[#3b82f6] font-medium">
        <i class="fas fa-chart-line"></i> QUẢN LÝ XE
      </a>
      <div class="px-6 pt-6 pb-2 text-xs font-semibold text-[#94a3b8] uppercase">QUẢN LÝ PHIẾU</div>
      <a href="#" class="flex items-center gap-2 px-6 py-2 hover:text-[#0f172a]"><i class="fas fa-font"></i> Quản lý phiếu</a>
      <a href="#" class="flex items-center gap-2 px-6 py-2 hover:text-[#0f172a]"><i class="fas fa-palette"></i> Màu sắc</a>
    </nav>
  </aside>

  <!-- Main content -->
  <div class="flex-1 flex flex-col">
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
        <h2 class="text-sm font-semibold">DANH SÁCH THÔNG TIN PHIẾU DỊCH VỤ</h2>
        
        <div class="bg-white rounded-md border overflow-x-auto">
          <table class="w-full text-sm text-left">
            <thead class="text-xs font-semibold text-[#334155] border-b">
              <tr>
                <th class="px-6 py-3">MÃ PHIẾU</th>
                <th class="px-6 py-3">MÃ KHÁCH HÀNG</th>
                <th class="px-6 py-3">HỌ VÀ TÊN</th>
                <th class="px-6 py-3">THỜI GIAN</th>
                <th class="px-6 py-3">LOẠI DỊCH VỤ</th>
                <th class="px-6 py-3">TRẠNG THÁI</th>
                <th class="px-6 py-3">HÀNH ĐỘNG</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dsphieu as $phieu)
                <tr class="border-b">
                  <td class="px-6 py-3">{{ $phieu->ma_phieu }}</td>
                  <td class="px-6 py-3">{{ $phieu->id_user }}</td>
                  <td class="px-6 py-3">{{ $phieu->taikhoan->username }}</td>
                  <td class="px-6 py-3">{{ $phieu->created_at->format('d/m/Y') }}</td>
                  <td class="px-6 py-3">{{ $phieu->loaiDichVu->ten_loai }}</td>
                  <td class="px-6 py-3 flex items-center gap-2">
                  <!-- <form onsubmit="event.preventDefault(); updateTrangThai('{{ $phieu->ma_phieu }}', this.trang_thai.value)"> -->
                  <select id="trang-thai-{{ $phieu->ma_phieu }}" class="border rounded px-2 py-1 text-sm">
                    <option value="Chờ xử lý" {{ $phieu->trang_thai == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="Tiếp nhận phiếu" {{ $phieu->trang_thai == 'Tiếp nhận phiếu' ? 'selected' : '' }}>Tiếp nhận phiếu</option>
                    <option value="Đã hoàn thành" {{ $phieu->trang_thai == 'Đã hoàn thành' ? 'selected' : '' }}>Đã hoàn thành</option>
                    <option value="Từ chối phiếu" {{ $phieu->trang_thai == 'Từ chối phiếu' ? 'selected' : '' }}>Từ chối phiếu</option>
                  </select>
                  <!-- </form> -->
                </td>
                    <td class="px-10 py-3">
                      <button onclick="showDetail('{{ $phieu->ma_phieu }}')" class="text-green-500 hover:text-green-700" title="Chi tiết">
                        <i class="fas fa-plus"></i>
                      </button>
                      <button onclick="updateTrangThai_('{{ $phieu->ma_phieu }}')" class="text-blue-500 hover:text-blue-700" title="Cập nhật">
                        <i class="fas fa-save"></i>
                      </button>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <h2 class="text-sm font-semibold">Chi Tiết Phiếu</h2>
        <div id="chi-tiet-phieu" class="bg-white rounded-md p-4 min-h-[200px] border">
          <p class="text-xs text-[#64748b] mb-1">Chọn 1 phiếu để xem chi tiết.</p>
        </div>
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
