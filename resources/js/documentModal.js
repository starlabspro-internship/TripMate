document.addEventListener("DOMContentLoaded", function() {
    function openDocumentModal(imageSrc) {
        document.getElementById('documentImage').src = imageSrc;
        document.getElementById('documentModal').classList.remove('hidden');
    }

    function closeDocumentModal() {
        document.getElementById('documentModal').classList.add('hidden');
    }

    window.openDocumentModal = openDocumentModal;
    window.closeDocumentModal = closeDocumentModal;
});
