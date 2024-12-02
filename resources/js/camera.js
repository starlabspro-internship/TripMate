document.addEventListener("DOMContentLoaded", () => {
    (() => {
        Webcam.set({
            width: 700,
            height: 400,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true,
        });

        if (document.getElementById('camera')) {
            Webcam.attach('#camera');
        }

        const cameraContainer = document.getElementById('camera');
        const captureButton = document.getElementById('capture');
        const imageDataField = document.getElementById('image_data');
        const capturedImageContainer = document.getElementById('captured-image-container');
        const capturedImage = document.getElementById('captured-image');
        const retakeButton = document.getElementById('retake');
        const uploadForm = document.getElementById('uploadForm');

        if (captureButton) {
            captureButton.addEventListener('click', () => {
                Webcam.snap((data_uri) => {
                    if (capturedImage) {
                        capturedImage.src = data_uri;
                        if (capturedImageContainer) {
                            capturedImageContainer.classList.remove('hidden');
                        }
                        if (imageDataField) {
                            imageDataField.value = data_uri;
                        }

                        if (cameraContainer) {
                            cameraContainer.style.display = 'none';
                        }
                        captureButton.style.display = 'none';
                    } else {
                        console.error("Element with ID 'captured-image' not found.");
                    }
                });
            });
        }

        if (retakeButton) {
            retakeButton.addEventListener('click', () => {
                Webcam.reset();
                if (document.getElementById('camera')) {
                    Webcam.attach('#camera');
                }

                if (capturedImageContainer) {
                    capturedImageContainer.classList.add('hidden');
                }
                if (cameraContainer) {
                    cameraContainer.style.display = 'block';
                }
                if (captureButton) {
                    captureButton.style.display = 'inline-block';
                }
            });
        }

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
                            if (data.redirect_url) {
                                window.location.href = data.redirect_url;
                            }
                            Webcam.reset();
                            if (capturedImage) {
                                capturedImage.src = "";
                            }
                            if (imageDataField) {
                                imageDataField.value = "";
                            }

                            if (capturedImageContainer) {
                                capturedImageContainer.classList.add('hidden');
                            }
                            if (cameraContainer) {
                                cameraContainer.style.display = 'block';
                            }
                            if (captureButton) {
                                captureButton.style.display = 'inline-block';
                            }
                        }
                    })
            });
        }
    })();
});
