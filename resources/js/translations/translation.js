let translations = {};

async function loadTranslations() {
    const response = await fetch("/translations");
    translations = await response.json();
}

function t(key) {
    console.log(translations);
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

//TODO: this is not supposed to be here, it's just for testing purposes 
document.getElementById("it").addEventListener("click", async function () {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    await fetch("/translations", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            locale: "it",
        }),
    }).then(() => {
        translateEverything();
    });
});
//TODO: same here as above
document.getElementById("en").addEventListener("click", async function () {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    await fetch("/translations", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            locale: "en",
        }),
    }).then(() => {
        translateEverything();
    });
});