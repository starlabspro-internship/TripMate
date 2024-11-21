document.addEventListener("DOMContentLoaded", () => {
    (() => {
        const scaleFactor = 0.75;

        
        Webcam.set({
            width: 700 * scaleFactor,
            height: 400 * scaleFactor,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true,
        });
        Webcam.attach('#camera');
    
        
        const cameraContainer = document.getElementById('camera');
        const captureButton = document.getElementById('capture');
        const imageDataField = document.getElementById('image_data');
        const capturedImageContainer = document.getElementById('captured-image-container');
        const capturedImage = document.getElementById('captured-image');
        const retakeButton = document.getElementById('retake');
        const uploadForm = document.getElementById('uploadForm');
    
        
        captureButton.addEventListener('click', () => {
            Webcam.snap((data_uri) => {
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
    
        
        retakeButton.addEventListener('click', () => {
            Webcam.reset();
            Webcam.attach('#camera');
    
            capturedImageContainer.classList.add('hidden');
            cameraContainer.style.display = 'block';
            captureButton.style.display = 'inline-block';
        });
    
       
        if (uploadForm) {
            uploadForm.addEventListener('submit', (event) => {
                event.preventDefault();
    
                const formData = new FormData(uploadForm);
    
                fetch(uploadForm.action, {
                    method: "POST",
                    body: formData,
                })
                    .then(response => response.json())
                    .then((data) => {
                        alert(data.message || "Your document has been uploaded successfully.");
                        if (data.success) {
                            Webcam.reset();
                            if (capturedImage) {
                                capturedImage.src = "";
                            }
                            imageDataField.value = "";
    
                            
                            capturedImageContainer.classList.add('hidden');
                            cameraContainer.style.display = 'block';
                            captureButton.style.display = 'inline-block';
                        }
                    })
                    .catch(() => {
                        alert("An error occurred. Please try again.");
                    });
            });
        }
        
    })();
});
