var viewerApi = null;
var isPlaying = false;
var isViewerInitialized = false;
var basePath = window.carImageBasePath; // Đường dẫn ảnh 360
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
            display: 'block',
            onInit: function () {
                // Sau khi khởi tạo xong, lấy API của SpriteSpin
                viewerApi = $("#viewer").spritespin("api");
                console.log("SpriteSpin API:", viewerApi);
            }
        });
    }
});
document.addEventListener("DOMContentLoaded", function () {
    var btn360 = document.getElementById("btn360");
    var viewer = document.getElementById("viewer");
    var btnzoom = document.getElementById("btnzoom");
    var zoomedImage = document.getElementById('zoomed-image');
    var isZoomed = zoomedImage.style.display === 'block';
    var isViewerInitialized = false;
    var viewerApi = null;
    var isPlaying = false;
    
    
    btnzoom.addEventListener("click", function(){
        $("#viewer").spritespin("destroy");
        $("#viewer").empty();
      if (!isZoomed) {
        viewer.style.display = 'none';
        zoomedImage.style.display = 'block';
      } else {
        viewer.style.display = 'block';
        zoomedImage.style.display = 'none';
      }
    });
    btn360.addEventListener("click", function () {
      // Hiển thị viewer nếu chưa hiển thị
      zoomedImage.style.display = 'none';
      if (viewer.style.display === "none" || viewer.style.display === "") {
        viewer.style.display = "block";
      }

      // Khởi tạo SpriteSpin nếu chưa khởi tạo
      if (!isViewerInitialized) {
        const frames = [];
        for (let i = 1; i <= 33; i++) {
          frames.push(`${basePath}/${String(i).padStart(2, '0')}.jpg`);
        }

        $("#viewer").spritespin({
          source: frames,
          width: viewer.offsetWidth,
          height: 800,
          sense: -1,
          frameTime: 120,
          animate: true,
          loop: true,
          onInit: function () {
            viewerApi = $("#viewer").spritespin("api");
            console.log("SpriteSpin API đã sẵn sàng");
            isViewerInitialized = true;
            isPlaying = true;
          }
        });
      } else {
        // Nếu đã khởi tạo, thì hủy và khởi tạo lại (refresh)
        $("#viewer").spritespin("destroy");
        

        const frames = [];
        for (let i = 1; i <= 33; i++) {
          frames.push(`${basePath}/${String(i).padStart(2, '0')}.jpg`);
        }

        $("#viewer").spritespin({
          source: frames,
          responsive: true,
          width: '100%',
          height: 'auto',

          sense: -1,
          frameTime: 120,
          animate: true,
          loop: true,
          onInit: function () {
            viewerApi = $("#viewer").spritespin("api");
            console.log("SpriteSpin API đã được refresh");
            isPlaying = true;
          }
        });
      }
    });
  });


// Hàm scroll đến phần chi tiết sản phẩm
function scrollToDetails() {
    document.getElementById("product-details").scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}
btn360.addEventListener('click', function() {
    // 3. Hiển thị viewer
    viewer.style.display = 'block';
  
    // 4. Nếu có khởi tạo thư viện 360-view thì gọi ở đây
    //    Ví dụ: initCar360Viewer(viewer);
  })
  
  document.addEventListener('DOMContentLoaded', function () {
    const hotspots = document.querySelectorAll('.hotspot');
    const popup = document.getElementById('popup-image');
    const popupImg = document.getElementById('popup-img');
    const popupClose = document.getElementById('popup-close');
    const popupOverlay = document.getElementById('popup-overlay');

    hotspots.forEach(hotspot => {
        hotspot.addEventListener('click', () => {
            const imageUrl = hotspot.dataset.img;
            popupImg.src = imageUrl;
            popup.style.display = 'flex';
        });
    });

    popupClose.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    popupOverlay.addEventListener('click', () => {
        popup.style.display = 'none';
    });
});