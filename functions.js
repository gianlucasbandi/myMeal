function hideIcon() {
    var s = document.getElementById("search");
  
    s.style.backgroundImage='none';
}

function childrenRow() {
    var table = document.getElementById("childTable");
    var row = table.insertRow(2);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
}

function result() {
    window.open("risultati.html")
}