<h2>Chào {{ $thongTin['ho_ten'] }},</h2>

<p>Bạn đã đặt lịch dịch vụ thành công tại AUTOSHOWROOM.</p>

<ul>
    <li><strong>Email:</strong> {{ $thongTin['email'] }}</li>
    <li><strong>Loại dịch vụ:</strong> {{ $thongTin['ten_loai'] }}</li>
    <li><strong>Ngày hẹn:</strong> {{ $thongTin['ngay_lap'] }}</li>
    <li><strong>Ghi chú:</strong> {{ $thongTin['noi_dung'] ?? 'Không có' }}</li>
</ul>

<p>Chúng tôi sẽ liên hệ bạn sớm để xác nhận thêm.</p>
<p>Trân trọng,</p>
<p><em>Đội ngũ AUTOSHOWROOM</em></p>
