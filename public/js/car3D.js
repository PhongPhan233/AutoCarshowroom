document.addEventListener('DOMContentLoaded', () => {
    const show3DButton = document.getElementById('show-3d-btn');
    const container = document.getElementById('3d-container');
    const backButton = document.getElementById('back-btn');
    const mainContent = document.querySelector('.main-content');

    if (!show3DButton || !container) {
        console.error('Thiếu phần tử #show-3d-btn hoặc #3d-container');
        return;
    }

    // Tạo nút "Quay lại"
    
  

    document.body.appendChild(backButton);

    show3DButton.addEventListener('click', () => {
        container.style.display = 'block'; // Hiển thị viewer
        init3DViewer(); // Khởi tạo
        show3DButton.style.display = 'none';
        backButton.style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' }); // Cuộn lên đầu
    });

    backButton.addEventListener('click', () => {
        container.style.display = 'none';
        show3DButton.style.display = 'inline-block';
        backButton.style.display = 'none';
    });

    function init3DViewer() {
        const modelUrl = container.getAttribute('data-model-url');
    
        const scene = new THREE.Scene();
        const renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        container.appendChild(renderer.domElement);
        scene.background = new THREE.Color("#fdfdfd");
        let camera, controls;
        
        const roomLight = new THREE.PointLight(0xffffff, 2, 40);
        roomLight.position.set(1, 1, 1); // gần vật thể
        scene.add(roomLight);
        const material = new THREE.MeshStandardMaterial({ color: 0x00ff00 });
        const spotLight = new THREE.SpotLight(0xffffff, 2);
        spotLight.position.set(0, 10, 0); // trên cao
        
        scene.add(spotLight);
        // scene.add(new THREE.AmbientLight(0xffffff, 0));
        // const roomLight = new THREE.PointLight(0xffffff, 2, 40);
        // roomLight.position.set(0, 5, 0);
        // scene.add(roomLight);
        const loader = new THREE.GLTFLoader();
        loader.load(modelUrl, (gltf) => {
            scene.add(gltf.scene);
            spotLight.target = gltf.scene;
            scene.add(spotLight.target);
            // Kiểm tra nếu file GLB có sẵn camera
            if (gltf.cameras && gltf.cameras.length > 0) {
                camera = gltf.cameras[0]; // Dùng camera trong file GLB
            } else {
                // Nếu không có, tạo camera mới
                camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.01, 100);
                camera.position.set(0, 2, 5);
            }
            
            
            console.log('Màu nền của scene:', scene.background);
            controls = new THREE.OrbitControls(camera, renderer.domElement);
            controls.target.set(0, 0, 0);
            controls.update();
    
            animate();
        }, undefined, (error) => {
            console.error('Lỗi tải model:', error);
        });
    
        window.addEventListener('resize', () => {
            if (!camera) return;
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
    }
});
const mainContent = document.querySelector('.main-content');

show3DButton.addEventListener('click', () => {
    container.style.display = 'block';
    init3DViewer();
    show3DButton.style.display = 'none';
    backButton.style.display = 'block';
    if (mainContent) mainContent.style.display = 'none'; // Ẩn nội dung khác
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

backButton.addEventListener('click', () => {
    container.style.display = 'none';
    show3DButton.style.display = 'inline-block';
    backButton.style.display = 'none';
    if (mainContent) mainContent.style.display = 'block'; // Hiện lại nội dung
});