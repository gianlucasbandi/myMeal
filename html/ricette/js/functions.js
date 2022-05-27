/*
    funzione searching attivata, si veda il file ricette.html, alla digitazione di caratteri nell'
    area di input. 
    funzionamento: 
    - si preleva l'input inserito dall'utente e lo converte in maiuscolo;
    - si scandiscono gli elementi della lista (che sono i possibili risultati di ricerca)
        anch'essi verranno convertiti in maiuscolo per garantire il matching con qualsiasi carattere inserito
    - si confrontano le due stringhe controllando se l'elemento cercato dall'utente è contenuto nella stringa
      della lista
        - se si quell'elemento della lista rimane visualizzato
        - altrimenti si setta la proprietà display a none così da "eliminarlo"
*/


function searching() {   
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

/* per visibilità si rende l'area di background della search bar cliccabile
   al click su di essa la lista scompare dalla visuale (funzione remove)
   mentre se si clicca nuovamente sulla search bar riappare (funzione show)
*/

function show() {
    var list = document.getElementById("myUL");
    var input = document.getElementById("myInput");
    list.style.display="initial";
}
function remove() {
    var list = document.getElementById("myUL");
    list.style.display="none";
}