
const html5QrCode = new Html5Qrcode("qr-reader");
document.addEventListener("DOMContentLoaded", function () {
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        // decodedText: Contiene il contenuto del QR code
        window.axios.post("/admin/orders/qrCode/checkValidity",{
            params: decodedText
        }).then((response) => {
            elaborateResponse(response);
            //html5QrCode.start().catch(err => console.error("Error starting scanner", err));
        }).catch((error) => {
            console.log(error);
        })  
        
        // Ferma lo scanner dopo aver letto un QR code
       // html5QrCode.stop().catch(err => console.error("Error stopping scanner", err));
    };

    const config = { fps: 10, qrbox: { width: window.innerWidth-100, height: window.innerHeight-100 } };

    // Avvia lo scanner
    html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback)
        .catch(err => {
            console.error("Errore nell'avviare lo scanner:", err);
        });
});

function elaborateResponse(response){
    console.log(response.data);
    let container = document.getElementById('qr-reader-results');

    //clean the container
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }

    if(response.data.valid){
        let image = document.createElement('i');
        image.classList.add('la', 'la-check-circle',"bigIcon","Success");
        container.appendChild(image);
        let message = document.createElement('p');
        message.innerText = "QR valido";
        message.classList.add("title");
        container.appendChild(message);
    }else{
        let image = document.createElement('i');
        image.classList.add('la', 'la-exclamation-triangle',"bigIcon","Bad");
        container.appendChild(image);
        let message = document.createElement('p');
        message.innerText = "QR code non valido";
        message.classList.add("title");
        container.appendChild(message);
    }
}

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
