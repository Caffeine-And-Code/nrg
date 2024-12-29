function moveDot() {
    const dot = document.getElementById("dot");
    dot.style.display = "none";
    // Trova il bottone di partenza (OldRoute) e quello di arrivo (Active)
    const startButton = document.querySelector(".oldRoute");
    const endButton = document.querySelector(".active");

    if (!startButton || !endButton) {
        // the previous route does not exist so we make the dot visible in the center of the active button
        const activeButton = document.querySelector(".active");
        if (!activeButton) {
            return;
        }
        dot.style.display = "block";
        const activeRect = activeButton.getBoundingClientRect();
        const activeX = activeRect.left + activeRect.width / 2;
        const activeY = activeRect.top + activeRect.height / 2;
        dot.style.top = `${activeY - dot.offsetHeight / 2}px`;
        dot.style.left = `${activeX - dot.offsetWidth / 2}px`;
        return;
    }

    // Ottieni le coordinate dei bottoni
    const startRect = startButton.getBoundingClientRect();
    const endRect = endButton.getBoundingClientRect();

    // Calcola le coordinate centrali dei bottoni
    const startX = startRect.left + startRect.width / 2;
    const startY = startRect.top + startRect.height / 2;
    const endX = endRect.left + endRect.width / 2;
    const endY = endRect.top + endRect.height / 2;

    // Imposta le coordinate iniziali del pallino
    dot.style.top = `${startY - dot.offsetHeight / 2}px`;
    dot.style.left = `${startX - dot.offsetWidth / 2}px`;
    dot.style.display = "block";
    
    // Imposta le variabili CSS per l'animazione
    dot.style.setProperty("--start-top", `${startY - dot.offsetHeight / 2}px`);
    dot.style.setProperty("--start-left", `${startX - dot.offsetWidth / 2}px`);
    dot.style.setProperty("--end-top", `${endY - dot.offsetHeight / 2}px`);
    dot.style.setProperty("--end-left", `${endX - dot.offsetWidth / 2}px`);
    
    // Attiva l'animazione
    dot.classList.remove("moving"); // Resetta l'animazione precedente
    void dot.offsetWidth; // Forza il reflow per riapplicare l'animazione
    dot.classList.add("moving");
}

document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        moveDot();
    }, 100);
});


window.addEventListener("resize", () => {
    setTimeout(() => {
        moveDot();
    }, 100);
});