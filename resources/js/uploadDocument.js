document.addEventListener("DOMContentLoaded", function () {
    
    const openButton = document.getElementById("openUploadButton");
    const uploadModal = document.getElementById("uploadModal");
    const uploadForm = document.getElementById("uploadForm");

    if (openButton) {
        openButton.addEventListener("click", function () {
            uploadModal.classList.remove("hidden");
        });
    }

   
    const closeUploadModal = () => uploadModal.classList.add("hidden");
    uploadModal.querySelector("button").addEventListener("click", closeUploadModal);

    
    if (uploadForm) {
        uploadForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                method: "POST",
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message || "An error occurred. Please try again.");
                    closeUploadModal();
                })
                .catch(() => alert("An error occurred. Please try again."));
        });
    }
});
