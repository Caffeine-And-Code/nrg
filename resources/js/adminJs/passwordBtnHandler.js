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