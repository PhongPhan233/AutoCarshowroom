var viewerApi = null;
var isPlaying = false;
basePath = window.carImageBasePath;
$(document).ready(function () {
    if ($('#viewer').length) {
        const frames = [];
        for (let i = 1; i <= 33; i++) {
            frames.push(`${basePath}/${String(i).padStart(2, '0')}.jpg`);
        }

        $("#viewer").spritespin({
            source: frames,
            sense: -1, // Quay ngược chiều kim đồng hồ
            frameTime: 120, // Thời gian mỗi khung hình (tốc độ quay)
            animate: true, // Không quay tự động khi load
            loop: true, // Lặp lại hoạt động
            onInit: function () {
                // Sau khi khởi tạo xong, lấy API của SpriteSpin
                viewerApi = $("#viewer").spritespin("api");
                console.log("SpriteSpin API:", viewerApi);
            }
        });
    }
});

function togglePlayStop(button) {
    const icon = button.querySelector("i");
    const text = button.querySelector("span");

    if (!viewerApi) {
        console.error("Viewer API chưa được khởi tạo.");
        return;
    }

    if (!isPlaying) {
    icon.classList.remove("fa-play");
    icon.classList.add("fa-stop");
    text.textContent = "STOP";
    
    viewerApi.start(); // Bắt đầu quay
    isPlaying = true;
} else {
    icon.classList.remove("fa-stop");
    icon.classList.add("fa-play");
    text.textContent = "PLAY";
    
    viewerApi.stop(); // Dừng quay
    isPlaying = false;
}
}

// Hàm scroll đến phần chi tiết sản phẩm
function scrollToDetails() {
    document.getElementById("product-details").scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}
