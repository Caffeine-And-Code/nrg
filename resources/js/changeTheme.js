import {changeTheme} from '../js/themeManager.js';

document.getElementById("LIGHT").addEventListener("click", function() {
    changeTheme("LIGHT");
});

document.getElementById("DARK").addEventListener("click", function() {
    changeTheme("DARK");
});