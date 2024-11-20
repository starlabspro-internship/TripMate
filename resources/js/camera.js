document.addEventListener("DOMContentLoaded", () => {
    (() => {
      
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true
        });
        Webcam.attach('#camera');
        
        const cameraContainer = document.getElementById('camera');
        const captureButton = document.getElementById('capture');
        const imageDataField = document.getElementById('image_data');
        const capturedImageContainer = document.getElementById('captured-image-container');
        const retakeButton = document.getElementById('retake');
        const submitButton = document.querySelector('button[type="submit"]');
        
        
        captureButton.addEventListener('click', function () {
            Webcam.snap(function (data_uri) {
                const capturedImage = document.getElementById('captured-image');
                if (capturedImage) {
                    capturedImage.src = data_uri;
                    capturedImageContainer.classList.remove('hidden');
                    imageDataField.value = data_uri;
        
                    cameraContainer.style.display = 'none';
                    captureButton.style.display = 'none';
                } else {
                    console.error("Element with ID 'captured-image' not found.");
                }
            });
        });
        
        
        
        retakeButton.addEventListener('click', function () {
            Webcam.reset();
            Webcam.attach('#camera');
        
            
            capturedImageContainer.classList.add('hidden');
            cameraContainer.style.display = 'block';
            captureButton.style.display = 'inline-block';
        });
        
        
        submitButton.addEventListener('click', function (event) {
            if (!imageDataField.value) {
                event.preventDefault();
                alert("Please capture an image before uploading.");
            }
        });
        
    })();
});
