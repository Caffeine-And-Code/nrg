import {changeTheme} from '../js/themeManager.js';

document.getElementById("LIGHT").addEventListener("click", function() {
    changeTheme("LIGHT");
    addSelected("LIGHT-label");
    removeSelected("DARK-label");
});

document.getElementById("DARK").addEventListener("click", function() {
    changeTheme("DARK");
    addSelected("DARK-label");
    removeSelected("LIGHT-label");
});

document.addEventListener('DOMContentLoaded', function() {
    let currentVal = localStorage.getItem('theme')
    addSelected(currentVal+"-label");
});

function removeSelected(id){
    document.querySelectorAll("."+id).forEach(function(item) {
        item.classList.remove('selected');
    });
}

function addSelected(id){
    document.querySelectorAll("."+id).forEach(function(item) {
        item.classList.add('selected');
    });
}