/*---------------funzione conta parole------------------*/

function readingTime() {
    const text = document.getElementById("articoli").innerText;
    const arr = text.trim();
    const parole = arr.split(/\s+/).length;
    const time = Math.ceil(parole / 250);
    document.getElementById("time").innerText = time;
    }

$(document).ready(function(){
    readingTime();
});