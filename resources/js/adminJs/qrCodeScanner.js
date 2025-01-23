
const html5QrCode = new Html5Qrcode("qr-reader");
document.addEventListener("DOMContentLoaded", function () {
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        // decodedText: Contiene il contenuto del QR code
        document.getElementById('qr-reader-results').innerText = `Scanned: ${decodedText}`;
        console.log("Decoded Text:", decodedText);
        console.log("Decoded Result:", decodedResult);
        
        // Ferma lo scanner dopo aver letto un QR code
        html5QrCode.stop().catch(err => console.error("Error stopping scanner", err));
    };

    const config = { fps: 10, qrbox: { width: window.innerWidth-100, height: window.innerHeight-100 } };

    // Avvia lo scanner
    html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback)
        .catch(err => {
            console.error("Errore nell'avviare lo scanner:", err);
        });
});

// // Scanner dalla webcam
// const html5QrCode = new Html5Qrcode("qr-reader");
// const qrCodeSuccessCallback = (decodedText, decodedResult) => {
//     document.getElementById('qr-reader-results').innerText = `Scanned: ${decodedText}`;
//     html5QrCode.stop();
// };

// html5QrCode.start({ facingMode: "environment" }, { fps: 10, qrbox: { width: 250, height: 250 } })
//     .catch(err => console.error(err));

// Scanner da immagine
// document.getElementById("qr-input-file").addEventListener("change", function (e) {
//     const file = e.target.files[0];
//     if (!file) return;
//     html5QrCode.clear();
//     html5QrCode.stop().catch(err => console.error(err));
//     html5QrCode.scanFile(file, true)
//         .then(decodedText => {
//             document.getElementById("qr-file-results").innerText = `Scanned: ${decodedText}`;
//         })
//         .catch(err => console.error(err));
// });
