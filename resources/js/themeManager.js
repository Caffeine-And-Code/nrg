import bigLogoLight from '../imgs/LIGHT/bigLogo.png';
import bigLogoDark from '../imgs/DARK/bigLogo.png';
import minimalLogoLight from '../imgs/LIGHT/minimalLogo.png';
import minimalLogoDark from '../imgs/DARK/minimalLogo.png';


const Themes = Object.freeze({
    LIGHT : {
        "dark": "#000000",
        "dark-text": "#494949",
        "light-text": "#939393",
        "stroke": "#CFCFCF",
        "darker-bg": "#E3E3E3",
        "bg": "#ffffff",
    },
    DARK : {
        "dark": "#ffffff",
        "dark-text": "#ffffff",
        "light-text": "#CFCFCF",
        "stroke": "#939393",
        "darker-bg": "#494949",
        "bg": "#2B2B2B",
    } 
});

function changeTheme(theme) {
    localStorage.setItem('theme', theme);

    let themeObj = Themes[theme];
    for(let key in themeObj) {
        document.documentElement.style.setProperty(`--${key}`, themeObj[key]);
    }

    handleImgs(theme);
}

function handleImgs(theme){
    // in here you can change the images based on the theme just call the replaceSingleImg function 
    // with the id of the image, the current theme, and the path of the image for each theme (imported from the top)
    // big logo
    replaceSingleImg('bigLogo', theme, bigLogoLight, bigLogoDark);
    // minimal logo
    replaceSingleImg('minimalLogo', theme, minimalLogoLight, minimalLogoDark);
}

function replaceSingleImg(imgId, theme, importedImageLight, importedImageDark) {
    let img = document.getElementById(imgId);
    if(img) {
        let path = theme === 'LIGHT' ? importedImageLight : importedImageDark;
        img.src = path.replace('/@fs', '');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    let currentVal = localStorage.getItem('theme')
    if(currentVal === null || Themes[currentVal] === undefined) {
        localStorage.setItem('theme', 'LIGHT');
        currentVal = 'LIGHT';
    }

    let theme = Themes[currentVal];
    for(let key in theme) {
        document.documentElement.style.setProperty(`--${key}`, theme[key]);
    }

    handleImgs(currentVal);
});

export { changeTheme };