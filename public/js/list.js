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
