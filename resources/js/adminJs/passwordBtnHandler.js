let visible = false;


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