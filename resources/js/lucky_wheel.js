function wheelOfFortune(selector) {
    drawWheel(selector)
    const node = document.querySelector(selector);
    if (!node) return;

    const wheel = node.querySelector('ul');
    let animation;
    let previousEndDegree = 0;
    document.querySelector(".wheel-article").addEventListener('click', () => {
        if (animation) {
            animation.cancel(); // Reset the animation if it already exists
        }

        //const randomAdditionalDegrees = Math.random() * 360 + 1800;
        const numberOfCycles = Math.floor(Math.random() * 10 + 1);
        const target = getExtractedIndex()
        const numberOfItems = getItemNumbers()
        const newEndDegree = getDegreeFor(target, 0, numberOfItems, numberOfCycles);

        animation = wheel.animate([
            { transform: `rotate(${previousEndDegree}deg)` },
            { transform: `rotate(${newEndDegree}deg)` }
        ], {
            duration: 6000,
            direction: 'normal',
            easing: 'cubic-bezier(.21,-0.21,.2,1.09)',
            fill: 'forwards',
            iterations: 1
        }).onfinish = () => {
            // const degree = newEndDegree % 360;
            // const itemRange = 360/12
            // const baseItem = degree / itemRange;
            // let item = null
            // if(degree < 180){
            //     item = zeroValue - baseItem;
            //     if(item < 0) {
            //         item = 12 - Math.abs(item);
            //     }
            // }
            // else {
            //     item = zeroValue + ((360 - degree) / itemRange);
            //     if(item > 12) {
            //         item = item - 12;
            //     }
            // }
            // item = Math.round(item);
            //
            // previousEndDegree = newEndDegree;
            // zeroValue =item

            //document.querySelector(".spin-result").innerHTML = getWinner();
            setTimeout(() => {
                location.href = "/wheel/collect";
            }, 1000)
        }
    });
}

function getDegreeFor(targetItem, zeroItem, totalItem, numberOfCircles) {
    const itemRange = 360 / totalItem;
    let degree = 0;
    let final = 0;
    if(targetItem <= (totalItem/2)){
        final = 360 - (targetItem * itemRange)
    }
    const randEndPoint = getRandomInt(-(itemRange/2), itemRange/2)
    final = final + randEndPoint;
    return (final + numberOfCircles * 360) + 90;
}

function getItemNumbers(){
    return document.querySelectorAll(".wheel-article > fieldset > ul > li").length
}

function getWinner(){
    const id = document.querySelector(".wheel-article > input[name=\"spin-value\"]").value;
    console.log("searching", id)
    let textToFound = "Nulla cazzo di budda"
    document.querySelectorAll(".wheel-article > fieldset > ul > li").forEach((item, index) => {
        console.log(item.getAttribute("data-id"))
        if(item.getAttribute("data-id") == id){
            textToFound = item.getAttribute("data-text");
        }
    })
    return textToFound;
}

function getExtractedIndex(){
    const id = document.querySelector(".wheel-article > input[name=\"spin-value\"]").value;
    let indexToFound = 0
    document.querySelectorAll(".wheel-article > fieldset > ul > li").forEach((item, index) => {
        if(item.getAttribute("data-id") == id){
            indexToFound = index;
        }
    })
    return indexToFound;
}
document.addEventListener('DOMContentLoaded', () => {
    wheelOfFortune('.ui-wheel-of-fortune');
})

function drawWheel(selector){
    let itemCount = document.querySelectorAll(`${selector} > ul > li`).length;
    document.querySelectorAll(`${selector} > ul > li`).forEach((item, index) => {
        item.style.aspectRatio = `1 / calc(2 * tan(180deg / ${itemCount}))`
        item.style.background = `hsl(${360/itemCount * index}, 100%, 75%)`;
        item.style.rotate = `${(360/itemCount * (index))}deg`;
    })
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
