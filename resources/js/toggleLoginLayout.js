document.addEventListener("DOMContentLoaded", function () {

    const loginZone = document.querySelector(".login-zone");
    const registrationZone = document.querySelector(".registration-zone");
    const mobileOnlyElements = document.querySelectorAll(".mobile-only");
    const desktopOnlyElements = document.querySelectorAll(".desktop-only");

    const switchLogin = document.getElementById("switchLogin");
    const switchRegister = document.getElementById("switchRegister");

    const registerErrorBox = document.getElementById("registerErrors");
    const loginErrorBox = document.getElementById("loginErrors");

    const sessionMessage = document.getElementById('session-message') ? document.getElementById('session-message').dataset.message : null;

    function load(withError) {
        if (sessionMessage == "TryRegister") {
            loginZone.style.display = "none";
            registrationZone.style.display = "flex";
            if (withError) {
                registerErrorBox.style.display = "block";
                loginErrorBox.style.display = "none";
            }
        }
        else {
            loginZone.style.display = "flex";
            registrationZone.style.display = "none";
            if (withError) {
                registerErrorBox.style.display = "none";
                loginErrorBox.style.display = "block";
            }
        }
    }

    function showLogin() {
        loginZone.style.display = "flex";
        registrationZone.style.display = "none";
        loginErrorBox.innerHTML = '';
    }

    function showRegister() {
        loginZone.style.display = "none";
        registrationZone.style.display = "flex";
        registerErrorBox.innerHTML = '';
    }

    function handleResize() {

        loginZone.style.display = "flex";
        if (window.innerWidth >= 770) {
            mobileOnlyElements.forEach(el => el.style.display = "none");
            desktopOnlyElements.forEach(el => el.style.display = "block");
            loginZone.style.display = "flex";
            registrationZone.style.display = "flex";
        } else {
            mobileOnlyElements.forEach(el => el.style.display = "block");
            desktopOnlyElements.forEach(el => el.style.display = "none");
            load();
        }
        
    }

    switchLogin.addEventListener("click", showLogin);
    switchRegister.addEventListener("click", showRegister);

    window.addEventListener("resize", handleResize);

    handleResize();
});