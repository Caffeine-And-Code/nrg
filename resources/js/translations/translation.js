let translations = {};

async function loadTranslations() {
    const response = await fetch("/translations");
    translations = await response.json();
}

function t(key) {
    return translations[key] || key;
}

async function translateEverything() {
    await loadTranslations();
    // get all the elements with the translate attribute
    const elements = document.querySelectorAll("[translate]");
    // loop through all the elements
    elements.forEach((element) => {
        const key = element.getAttribute("translate");
        element.innerHTML = t(key);
    });
}

translateEverything();

export { translateEverything };