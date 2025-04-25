
$(document).ready(function () {
    // 1. Highlight input khi focus
    $('.form input, .form select, .form textarea').on('focus', function () {
        $(this).css('border', '2px solid #000');
    }).on('blur', function () {
        $(this).css('border', 'none');
    });

    // 2. Kiểm tra người dùng có chọn dịch vụ không
    $('#bookingForm').on('submit', function (e) {
        var service = $('#service').val();
        if (!service) {
            alert('Please select a service before booking.');
            $('#service').focus();
            e.preventDefault();
        }
    });

    // 3. Smooth scroll khi click vào anchor link (nếu có dùng)
    $('a[href^="#"]').on('click', function (e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 50
            }, 800);
        }
    });
});

