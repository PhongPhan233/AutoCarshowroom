document.querySelectorAll('.filter-section ul li > a').forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();      // Ngăn reload trang
        e.stopPropagation();     // Ngăn sự kiện lan ra ngoài

        const li = e.target.closest('li');

        // Đóng tất cả các dropdown khác cùng cấp
        li.parentElement.querySelectorAll('li').forEach(item => {
            if (item !== li) {
                item.classList.remove('open');
            }
        });

        // Toggle dropdown của item được click
        li.classList.toggle('open');
    });
});

// Đóng dropdown nếu click ra ngoài
document.addEventListener('click', (e) => {
    document.querySelectorAll('.filter-section ul li').forEach(li => {
        if (!li.contains(e.target)) {
            li.classList.remove('open');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-readmore');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const description = this.previousElementSibling;
            description.classList.toggle('show');

            if (description.classList.contains('show')) {
                this.textContent = "Thu gọn";
            } else {
                this.textContent = "Xem thêm";
            }
        });
    });
});



    const toggleBtn = document.getElementById("toggleFilterBtn");
    const filterBar = document.getElementById("filterBar");

    toggleBtn.addEventListener("click", () => {
        filterBar.classList.toggle("d-none");
    });

    // Xử lý lọc (tuỳ chọn)
    document.querySelectorAll('.filter-control').forEach(item => {
        item.addEventListener('change', () => {
            const type = item.dataset.type;
            const value = item.value;
            console.log(`Filter: ${type} = ${value}`);
            // TODO: Gửi AJAX hoặc lọc kết quả
        });
    });

