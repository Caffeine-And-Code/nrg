let visible = false;
let visibleConfirm = false;

document.getElementById("togglePassword").addEventListener("click", function () {
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

document.getElementById("togglePasswordReg").addEventListener("click", function () {
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