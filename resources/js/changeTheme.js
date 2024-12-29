import {changeTheme} from '../js/themeManager.js';

document.getElementById("LIGHT").addEventListener("click", function() {
    changeTheme("LIGHT");
    document.getElementById("DARK-label").classList.remove('selected');
    document.getElementById("LIGHT-label").classList.add('selected');
});

document.getElementById("DARK").addEventListener("click", function() {
    changeTheme("DARK");
    document.getElementById("LIGHT-label").classList.remove('selected');
    document.getElementById("DARK-label").classList.add('selected');
});

document.addEventListener('DOMContentLoaded', function() {
    let currentVal = localStorage.getItem('theme')
    let btn = document.getElementById(currentVal+"-label");
    if(btn) {
        btn.classList.add('selected');
    }
});