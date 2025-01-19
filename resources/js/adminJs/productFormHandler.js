document.getElementById('goBack').addEventListener('click', function(event) {
    event.preventDefault();  // Annulla l'azione di submit del form
    window.location.href = '/admin/settings';  // Reindirizza alla pagina dei prodotti
});

// Ottieni gli elementi HTML
const selectImageButton = document.getElementById('selectImageButton');
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');

// Quando l'utente clicca sul pulsante, simula il clic sull'input file
selectImageButton.addEventListener('click', function() {
    imageInput.click();
});

// Quando un file viene selezionato, mostriamo un'anteprima dell'immagine
imageInput.addEventListener('change', function() {
    const file = imageInput.files[0];  // Prendi il primo file (solo un'immagine)
    
    if (file) {
        const reader = new FileReader();
        
        // Quando il file è stato caricato, mostra l'anteprima
        reader.onload = function(e) {
            imagePreview.src = e.target.result;  // Imposta la sorgente dell'immagine
            imagePreview.style.display = 'block'; // Rendi visibile l'immagine
        };
        
        // Leggi il file come URL
        reader.readAsDataURL(file);
    } 
});


document.getElementById("removeImage").addEventListener("click", function() {
    imageInput.value = "";  // Cancella il file selezionato
    imagePreview.src = "";  // Cancella l'anteprima
});

