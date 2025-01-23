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

document.getElementById("toggleConfirmPassword").addEventListener("click", function (){
    

    var password = document.getElementById("passwordConf");
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