import { translateEverything } from "../js/translations/translation.js";

// change the language to italian 
document.getElementById("IT").addEventListener("click", async function () {
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
        document.getElementById("IT").classList.add('selected');
        document.getElementById("EN").classList.remove('selected');
    });
});

// change the language to english
document.getElementById("EN").addEventListener("click", async function () {
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
        document.getElementById("EN").classList.add('selected');
        document.getElementById("IT").classList.remove('selected');
    });
});