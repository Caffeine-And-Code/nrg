
document.querySelectorAll(".goBack").forEach(function(element) {
    element.addEventListener("click", function(event) {
        event.preventDefault();  // Annulla l'azione di submit del form
        window.location.href = '/admin/settings';  // Reindirizza alla pagina dei prodotti
    });
});
    
    
    // Ottieni gli elementi HTML
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    // Quando l'utente clicca sul pulsante, simula il clic sull'input file
    document.querySelectorAll(".selectImageButton").forEach(el => 
        el.addEventListener('click', function() {
            imageInput.click();
        })
    )
    
    // Quando un file viene selezionato, mostriamo un'anteprima dell'immagine
    imageInput.addEventListener('change', function() {
        const file = imageInput.files[0];  // Prendi il primo file (solo un'immagine)
        
        document.querySelectorAll(".imageInput").forEach(el => {
            console.log(el.files)
            // el.files.push(file)
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file); // Aggiungi il file al DataTransfer

                // Imposta i file virtuali sull'input
                el.files = dataTransfer.files;
            
        });
        
        if (file) {
            const reader = new FileReader();
            
            // Quando il file è stato caricato, mostra l'anteprima
            reader.onload = function(e) {
                document.querySelectorAll(".imagePreview").forEach(el => el.src = e.target.result);
            };
            
            // Leggi il file come URL
            reader.readAsDataURL(file);
        } 
    });
    
    
    document.querySelectorAll(".removeImage").forEach(el => 
        el.addEventListener("click", function() {
            imageInput.value = "";  // Cancella il file selezionato
            document.querySelectorAll(".imagePreview").forEach(el => {
                el.src = ""
            });  // Cancella l'anteprima
        })
    )


