const sliders = document.querySelectorAll('.gallery');
sliders.forEach((slider) => {
    let isDown = false;
    let startX;
    let scrollLeft;
    slider.addEventListener('dragstart', (e) => e.preventDefault());
    // Quando il mouse è premuto
    slider.addEventListener('mousedown', (e) => {
        console.log('mouse down');
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        // Previeni la selezione del testo durante il drag
        document.body.style.userSelect = 'none';
    });
    // Quando il mouse lascia l'area del carosello
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
        // Ripristina la selezione del testo
        document.body.style.userSelect = '';
    });
    // Quando il mouse viene rilasciato
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
        // Ripristina la selezione del testo
        document.body.style.userSelect = '';
        console.log(slider.scrollLeft);
        handleSnap(sliders[0]); // Gestisce lo snap al rilascio
        handleSnap(sliders[1]); // Gestisce lo snap al rilascio
    });
    // Quando il mouse si muove
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return; // Ignora se il mouse non è premuto
        e.preventDefault(); // Previene l'azione predefinita del browser
        console.log('mouse move');
        const x = e.pageX - slider.offsetLeft;
        const SCROLL_SPEED = 3; // Velocità di scorrimento
        const walk = (x - startX) * SCROLL_SPEED; // Calcola lo scorrimento
        console.log(scrollLeft - walk);
        slider.scrollLeft = scrollLeft - walk;
    });
    // Avvia il timer per cambiare elemento evidenziato
    startHighlightTimer(slider);
});
// Funzione per avviare il timer e scorrere agli elementi
function startHighlightTimer(slider) {
    const items = slider.querySelectorAll('li');
    let currentIndex = 0;
    // Rimuove evidenziazione da tutti gli elementi
    function clearHighlight() {
        items.forEach((item) => item.classList.remove('highlight'));
    }
    // Imposta il timer
    setInterval(() => {
        clearHighlight(); // Rimuovi l'evidenziazione precedente
        items[currentIndex].classList.add('highlight'); // Aggiungi la classe al nuovo elemento
        // Scorri verso l'elemento evidenziato
        const targetLeft = items[currentIndex].offsetLeft - slider.offsetLeft - (window.innerWidth <= 537 ? 240 : 280);
        slider.scrollTo({
            left: targetLeft,
            behavior: 'smooth',
        });
        // Passa all'indice successivo
        currentIndex = (currentIndex + 1) % items.length;
    }, 4000); // Cambia ogni secondo
}
// Funzione per gestire lo snap al rilascio
function handleSnap(slider) {
    const items = slider.querySelectorAll('.carouselItem'); // Elementi del carousel
    const sliderScrollLeft = slider.scrollLeft;
    let closestItem = null;
    let closestDistance = Infinity;
    console.log(sliderScrollLeft);
    // Trova l'elemento più vicino alla posizione corrente
    items.forEach((item) => {
        const itemLeft = item.offsetLeft - slider.offsetLeft;
        const distance = Math.abs(itemLeft - sliderScrollLeft);
        if (distance < closestDistance) {
            closestDistance = distance;
            closestItem = item;
        }
    });
    // Effettua lo scroll verso l'elemento più vicino
    if (closestItem) {
        slider.scrollTo({
            left: closestItem.offsetLeft - slider.offsetLeft,
            behavior: 'smooth', // Scroll fluido
        });
    }
}
