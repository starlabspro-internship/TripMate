import { Html5QrcodeScanner } from "html5-qrcode";

document.addEventListener("DOMContentLoaded", () => {
    const onScanSuccess = (decodedText, decodedResult) => {
        window.location.href = decodedText; 
    };

    if (!document.getElementById("my-qr-reader")) {
        return;
    }

    let htmlscanner = new Html5QrcodeScanner("my-qr-reader", {
        fps: 10,
        videoConstraints: {
            facingMode: "environment" 
        },
        disableFileInput: true
    });

    htmlscanner.render(onScanSuccess);
});