function readingTime() {
    const paroleMin = 250;
    const text = document.getElementById("articoli").innerText;
    const arr = text.trim();
    const words = arr.split(/\s+/).length;
    const time = Math.ceil(words / paroleMin);
    document.getElementById("time").innerText = time;
    }

$(document).ready(function(){
    readingTime();
});

