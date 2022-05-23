function addRows() {
  var table = document.getElementById('pasto');
  var rowCount = table.rows.length;
  var cellCount = table.rows[0].cells.length;
  var row = table.insertRow(rowCount);
  for (var i = 0; i < cellCount; i++) {
    var cell = 'cell' + i;
    cell = row.insertCell(i);
    var copycel = document.getElementById('col' + i).innerHTML;
    cell.innerHTML = copycel;
  }
}
function deleteRows() {
  var table = document.getElementById('pasto');
  var rowCount = table.rows.length;
  if (rowCount > '1') {
    var row = table.deleteRow(rowCount - 1);
    rowCount--;
  }
}

let alimenti;
let inserisciBtn = document.querySelector('#nuova-riga');
let tabellaContainer = document.querySelector("#tabella-container");
inserisciBtn.addEventListener('click', inserisciAlimento);

function generaTabella() {
  const formData = new FormData();
  formData.append('data',document.querySelector("#data").value);
  fetch('./select.php', {
    method: 'POST',
    header: {
      'Content-Type': 'application/json'
    },
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      alimenti = data;
      console.log('Dati ricevuti: ', data);
      let tabella = `
        <table>
          <thead>
            <tr>
              <td>Nome</td>
              <td>Peso</td>
              <td>Carboidrati</td>
              <td>Proteine</td>
              <td>Grassi</td>
              <td>Calorie</td>
            </tr>
          </thead>
          <tbody>
            ${generaRighe(data)}
          </tbody>
          <tr>
            <td>
              <button class="aggiungi-alimento">Aggiungi</button>
            </td>
          </tr>
        </table>
        `;
      tabellaContainer.innerHTML = tabella;
    })
    .catch((error) => {
      console.error('Errore: ', error);
    });
}

function generaRighe(alimenti) {
  let righe = '';
  alimenti.forEach(alimento => {
    let riga = `
        <tr>
          <td>${alimento.nome}</td>
          <td>${alimento.peso}</td>
          <td>${alimento.carboidrati}</td>
          <td>${alimento.proteine}</td>
          <td>${alimento.grassi}</td>
          <td>${alimento.calorie}</td>
          <td>
            <button class="elimina-alimento" data-val="${alimento.nome}">Elimina</button>
          </td>
        </tr>
      `;
    righe += riga;
  });
  return righe;
}

// ricerca suggerimenti alimenti su db 
$(function () {
  $("#alimento").autocomplete({
    source: 'cercaAlimento.php',
  });
});

$(function () {
  $("#data").autocomplete({
    source: "select.php",
    response: () => {
      aggiornaTabella();
    }
  })
});

$(function () {
  $("#tipo").autocomplete({
    source: 'cercaAlimento.php',
  });
});

// data di oggi per input data
$(document).ready(function () {
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var today = year + "-" + month + "-" + day;
  document.getElementById("data").value = today;
  generaTabella();
});

function inserisciAlimento() {
  if (document.querySelector('#alimento').value=='') {
    document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Seleziona un alimento da inserire!</p>';
  }
  else {
    document.querySelector('#messaggi').innerHTML = '';
    fetch('./insert.php', {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: new FormData(document.querySelector('#form'))
    })
    .then(response => response.json())
    .then(data => {
      if (data['messaggio'] == "Alimento non presente nel database") {
        document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Seleziona un alimento tra quelli presenti!</p>';
      } else {
        if (data['messaggio'] == "alimento già inserito") {
          document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Alimento già inserito!</p>';
        } else {
          console.log(data);
          aggiornaTabella();
        }
      }
    })
    .catch((error) => {
      console.error('Errore: ', error);
    });
  }
}

function aggiornaTabella() {
  let tabella = document.querySelector('table');
  tabellaContainer.innerHTML = "";
  generaTabella();
}