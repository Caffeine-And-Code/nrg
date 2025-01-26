let visible = false;
let visibleConfirm = false;

const passwordId = document.getElementById("togglePassword");
if (passwordId){
    passwordId.addEventListener("click", function () {
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visible) {
            document.getElementById("eye").style.display = "none";
            document.getElementById("eye-slash").style.display = "block";
            visible = false;
        } else {
            document.getElementById("eye").style.display = "block";
            document.getElementById("eye-slash").style.display = "none";
            visible = true;
        }
    });
}

const confirmPassword = document.getElementById("toggleConfirmPassword");
if (confirmPassword) {
    confirmPassword.addEventListener("click", function (){

        var password = document.getElementById("password_confirmation");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visibleConfirm) {
            document.getElementById("eye2").style.display = "none";
            document.getElementById("eye-slash2").style.display = "block";
            visibleConfirm = false;
        } else {
            document.getElementById("eye2").style.display = "block";
            document.getElementById("eye-slash2").style.display = "none";
            visibleConfirm = true;
        }
    });
}

const passwordReg = document.getElementById("togglePasswordReg");
if (passwordReg) {
    passwordReg.addEventListener("click", function () {
        var password = document.getElementById("passwordReg");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visible) {
            document.getElementById("eyeReg").style.display = "none";
            document.getElementById("eye-slashReg").style.display = "block";
            visible = false;
        } else {
            document.getElementById("eyeReg").style.display = "block";
            document.getElementById("eye-slashReg").style.display = "none";
            visible = true;
        }
    });
}

const pProfileMob = document.getElementById("togglePasswordRegMobile");
if (pProfileMob) {
    pProfileMob.addEventListener("click", function () {
        var password = document.getElementById("passwordRegMobile");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visible) {
            document.getElementById("eyeMobile").style.display = "none";
            document.getElementById("eye-slashMobile").style.display = "block";
            visible = false;
        } else {
            document.getElementById("eyeMobile").style.display = "block";
            document.getElementById("eye-slashMobile").style.display = "none";
            visible = true;
        }
    });
}

const pProfileDesk = document.getElementById("togglePasswordRegDesktop");
if (pProfileDesk) {
    pProfileDesk.addEventListener("click", function () {
        var password = document.getElementById("passwordRegDesktop");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visible) {
            document.getElementById("eyeDesktop").style.display = "none";
            document.getElementById("eye-slashDesktop").style.display = "block";
            visible = false;
        } else {
            document.getElementById("eyeDesktop").style.display = "block";
            document.getElementById("eye-slashDesktop").style.display = "none";
            visible = true;
        }
    });
}

const confirmPasswordMobile = document.getElementById("toggleConfirmPasswordMobile");
if (confirmPasswordMobile) {
    confirmPasswordMobile.addEventListener("click", function (){

        var password = document.getElementById("password_confirmationMobile");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visibleConfirm) {
            document.getElementById("eye2Mobile").style.display = "none";
            document.getElementById("eye-slash2Mobile").style.display = "block";
            visibleConfirm = false;
        } else {
            document.getElementById("eye2Mobile").style.display = "block";
            document.getElementById("eye-slash2Mobile").style.display = "none";
            visibleConfirm = true;
        }
    });
}

const confirmPasswordDesktop = document.getElementById("toggleConfirmPasswordDesktop");
if (confirmPasswordDesktop) {
    confirmPasswordDesktop.addEventListener("click", function (){

        var password = document.getElementById("password_confirmationDesktop");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    
        if (visibleConfirm) {
            document.getElementById("eye2Desktop").style.display = "none";
            document.getElementById("eye-slash2Desktop").style.display = "block";
            visibleConfirm = false;
        } else {
            document.getElementById("eye2Desktop").style.display = "block";
            document.getElementById("eye-slash2Desktop").style.display = "none";
            visibleConfirm = true;
        }
    });
}