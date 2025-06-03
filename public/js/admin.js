function showDetail(maPhieu) {
    const detailBox = document.getElementById('chi-tiet-phieu');

    if (!detailBox) {
        console.warn('Không tìm thấy phần tử chi-tiet-phieu');
        return; // Không làm gì cả nếu không có div chi-tiet-phieu
    }

    fetch(`admin/phieu/${maPhieu}/detail`)  // Sửa lại đường dẫn
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            detailBox.innerHTML = `
                <div class="space-y-2">
                    <p><strong>Mã Phiếu:</strong> ${data.data.ma_phieu}</p>
                    <p><strong>Người Lập:</strong> ${data.data.nguoi_lap}</p>
                    <p><strong>Ngày Lập:</strong> ${data.data.ngay_lap}</p>
                    <p><strong>Loại Dịch Vụ:</strong> ${data.data.loai_dich_vu}</p>
                    <p><strong>Nội Dung:</strong> ${data.data.noi_dung ?? 'Không có ghi chú'}</p>
                </div>
            `;
        } else {
            detailBox.innerHTML = `<p class="text-red-500">${data.message}</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        detailBox.innerHTML = `<p class="text-red-500">Lỗi tải dữ liệu chi tiết.</p>`;
    });
}
function updateTrangThai(maPhieu, trangThai) {
        fetch(`/admin/phieu/${maPhieu}/update-trang-thai`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ trang_thai: trangThai })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cập nhật trạng thái thành công!');
            } else {
                alert('Cập nhật thất bại!');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra khi cập nhật!');
        });
    }
    function updateTrangThai_(maPhieu) {
      // Lấy giá trị trạng thái từ select
      const trangThai = document.getElementById(`trang-thai-${maPhieu}`).value;
    
      // Gửi yêu cầu PUT tới server
      fetch(`admin/phieu/${maPhieu}/update-trang-thai`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ trang_thai: trangThai })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Cập nhật trạng thái thành công!');
        } else {
          alert('Cập nhật thất bại!');
        }
      })
      .catch(error => {
        console.error('Lỗi:', error);
        alert('Có lỗi xảy ra khi cập nhật!');
      });
    }
  
