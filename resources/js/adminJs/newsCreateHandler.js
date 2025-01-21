document.getElementById("newsCreate").addEventListener("click", function () {
    let images = document.getElementById('newImage').files;
    console.log(images)
    images = Array.from(images)
    images.forEach((element,index) => {
        createNewsComponent({
            image_path: URL.createObjectURL(element),
            id: index
        },document.getElementById('newImage'));
        
    });

});



document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById("confirmNews").addEventListener("click", function () {
        const images = document.getElementById('newImage').files;
        console.log(images)
        console.log("mannala ")
        // Crea un FormData per inviare i file
        const formData = new FormData();
    
        // Aggiungi le immagini al FormData
        for (let i = 0; i < images.length; i++) {
            formData.append("images[]", images[i]);
        }
        window.axios
            .post("/admin/news", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then(function (response) {
                console.log(response);
                // Aggiungi qui il codice per gestire la risposta del server
                window.location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});

function createNewsComponent(newsItem, inputElement) {
    // Crea il div principale con classe "singleNews"
    const singleNewsDiv = document.createElement('div');
    singleNewsDiv.classList.add('singleNews');
    
    // Aggiungi lo stile di background-image
    singleNewsDiv.style.backgroundImage = `url('${newsItem.image_path}')`;

    const overlayForm = document.createElement('form');
    overlayForm.classList.add('overlay');

    // Crea il bottone di cancellazione
    const deleteBtn = document.createElement('button');
    deleteBtn.type = 'button'; // Imposta il tipo a "button" per evitare che il form venga inviato direttamente
    deleteBtn.classList.add('deleteNewsBtn');

    // Crea l'icona del bottone (usando FontAwesome o un'icona di tua scelta)
    const deleteIcon = document.createElement('i');
    deleteIcon.classList.add('las', 'la-trash', 'deleteNewsIcon');
    deleteBtn.appendChild(deleteIcon);

    // Aggiungi un event listener per gestire il click sul bottone
    deleteBtn.addEventListener('click', function() {
        // Rimuovi l'elemento dal DOM
        singleNewsDiv.remove();

        // Rimuovi l'immagine dalla lista dei file nell'input
        const index = newsItem.id;  // usa l'id per determinare quale immagine eliminare
        const dataTransfer = new DataTransfer();  // Utilizziamo DataTransfer per modificare la lista dei file

        // Aggiungi tutti gli altri file tranne quello da rimuovere
        for (let i = 0; i < inputElement.files.length; i++) {
            if (i !== index) {
                dataTransfer.items.add(inputElement.files[i]);
            }
        }

        // Aggiorna il valore di files dell'input
        inputElement.files = dataTransfer.files;
    });

    // Aggiungi il bottone al form
    overlayForm.appendChild(deleteBtn);

    // Aggiungi il form al div principale
    singleNewsDiv.appendChild(overlayForm);


    // Aggiungi il componente al contenitore esistente
    document.getElementById('newsContainer').appendChild(singleNewsDiv);
}