<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Model Viewer</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/spritespin@4.0.11/release/spritespin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.142.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.142.0/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.142.0/examples/js/controls/OrbitControls.js"></script> <!-- OrbitControls -->
    <style>
        
    </style>
</head>
<body>

    <div id="3d-container"></div>

    <script>
        // Tạo scene, camera, renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('3d-container').appendChild(renderer.domElement);

        // Ánh sáng môi trường
        const light = new THREE.AmbientLight(0x404040, 2); // Ánh sáng mờ
        scene.add(light);

        // Ánh sáng chiếu
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // Tải mô hình GLB
        const loader = new THREE.GLTFLoader();
        loader.load('{{ asset("models/lamborghini_aventador.glb") }}', function(gltf) {
            // Thêm mô hình vào scene
            scene.add(gltf.scene);

            // Điều chỉnh tỷ lệ mô hình (nếu cần)
            gltf.scene.scale.set(1, 1, 1);

            // Điều chỉnh vị trí mô hình (nếu cần)
            gltf.scene.position.set(0, 0, 0);

            // Bắt đầu render lại scene
            animate();
        }, undefined, function(error) {
            console.error(error);
        });

        // Cập nhật camera
        camera.position.z = 5;

        // OrbitControls cho phép tương tác (xoay, phóng to/thu nhỏ)
        const controls = new THREE.OrbitControls(camera, renderer.domElement);

        // Hàm render lại scene
        function animate() {
            requestAnimationFrame(animate);
            controls.update(); // Cập nhật OrbitControls
            renderer.render(scene, camera);
        }

        // Cập nhật kích thước của renderer khi thay đổi kích thước cửa sổ
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>
