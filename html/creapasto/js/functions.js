// button inserisci alimento 
$('#nuova-riga').on('click', inserisciAlimento);

// zona per inserire tabella
let tabellaContainer;

// contatori nutrienti e calorie
let carboidrati;
let grassi;
let proteine;
let calorie;
let messaggi;

// mostra tabella alimenti di oggi quando si accede
$(document).ready(function () {
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;
  var today = year + "-" + month + "-" + day;
  document.getElementById("data").value = today;
  carboidrati = 0;
  grassi = 0;
  proteine = 0;
  calorie = 0;
  tabellaContainer = document.querySelector("#tabella-container");
  messaggi = document.querySelector('#messaggi');
  generaTabella();
});

// ricerca suggerimenti alimenti su db 
$(function () {
  $("#alimento").autocomplete({
    source: './php/cercaAlimento.php',
  });
});

// aggiorna tabella al cambio data
$('#data').on('change', aggiornaTabella);

// aggiorna tabella al cambio pasto
$('#tipo').on('change', aggiornaTabella);

// inserisce alimento
function inserisciAlimento() {

  if (document.querySelector('#alimento').value == '') {
    // nessun alimento inserito
    messaggi.innerHTML = '<p style="color:red;">Seleziona un alimento da inserire!</p>';
  }
  else {
    messaggi.innerHTML = '';
    let formdata = new FormData(document.querySelector('#form'));
    fetch('./php/insert.php', {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: formdata
    })
      .then(response => response.json())
      .then(data => {
        if (data['messaggio'] == "Alimento non presente nel database") {
          // alimento non presente nel db
          messaggi.innerHTML = '<p style="color:red;">Seleziona un alimento tra quelli presenti!</p>';
        } else {
          if (data['messaggio'] == "alimento già inserito") {
            // alimento già inserito
            messaggi.innerHTML = '<p style="color:red;">Alimento già inserito!</p>';
          } else {
            // success
            aggiornaTabella();
          }
        }
      })
      .catch((error) => {
        console.error('Errore: ', error);
      });
  }
}

function eliminaAlimento(e) {
  let data = new FormData(document.querySelector('#form'));
  data.append('data-val', e.target.getAttribute('data-val')); // aggiunge l'alimento da eliminare al body
  fetch('./php/delete.php', {
    method: 'POST',
    header: {
      'Content-Type': 'application/json'
    },
    body: data
  })
    .then(response => response.json())
    .then(data => {
      // success
      aggiornaTabella();
    })
    .catch((error) => {
      console.error('Errore: ', error);
    });
}

function modificaAlimento(e) {
  let id = e.target.getAttribute('data-val'); // alimento da modificare
  let gr = document.querySelector(`[data-val='${id}']`).value; // grammi scelti da inserire
  if (gr == '') {
    messaggi.innerHTML = '<p style="color:red;">Inserisci i grammi!</p>';
  }
  else {
    let data = new FormData(document.querySelector('#form'));
    data.append('peso', gr);
    data.append('cibo', id);
    fetch('./php/update.php', {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: data
    })
      .then(response => response.json())
      .then(data => {
        aggiornaTabella();
      })
      .catch((error) => {
        console.error('Errore: ', error);
      });
  }
}

function aggiornaTabella() {
  tabellaContainer.innerHTML = ""; // azzera tabella presente
  generaTabella();
}

function generaTabella() {
  const formData = new FormData();
  formData.append('data', document.querySelector("#data").value);
  formData.append('tipo', document.querySelector("#tipo").value);
  fetch('./php/select.php', {
    method: 'POST',
    header: {
      'Content-Type': 'application/json'
    },
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
        // se nel db sono presenti alimenti per quei parametri (data,pasto,utente)
        alimenti = data;
        let tabella = `
        <table>
          <thead>
            <tr>
              ${generaIntestazione(data)}
            </tr>
          </thead>
          <tbody>
            ${generaRighe(data)}
          </tbody>
        </table>
        `;
        tabellaContainer.innerHTML = tabella; // inserisce tabella generata nella zona tabella-container
        let deleteBtn = document.querySelectorAll(".elimina-alimento"); // tutti i bottoni elimina
        let updateBtn = document.querySelectorAll(".modifica-alimento"); // tutti i bottoni modifica
        // aggiunge event listener a tutti i bottoni elimina
        for (let i = 0; i < deleteBtn.length; i++) {
          deleteBtn[i].addEventListener('click', eliminaAlimento);
        }
        // aggiunge event listener a tutti i bottoni modifica
        for (let i = 0; i < updateBtn.length; i++) {
          updateBtn[i].addEventListener('click', modificaAlimento);
        }
        let res = generaNutrienti(data);
        let nutrienti = `<table>
                        <tr>
                        <td>Carboidrati: ${res[0].toFixed(2)}</td>
                        <td>Proteine: ${res[1].toFixed(2)}</td>
                        <td>Grassi: ${res[2].toFixed(2)}</td>
                        <td>Calorie: ${res[3].toFixed(2)}</td>
                        </tr>
                        </table>
                        `
        document.querySelector("#nutrienti").innerHTML = nutrienti;
        carboidrati = 0;
        grassi = 0;
        proteine = 0;
        calorie = 0;
      }
      else {
        tabellaContainer.innerHTML = '<p>Nessun alimento inserito</p>';;
        document.querySelector("#nutrienti").innerHTML = '';
      }
    })
    .catch((error) => {
      console.error('Errore: ', error);
    });
}

function generaIntestazione(alimenti) {
  let riga = `
          <td>Nome</td>
          <td>Carboidrati</td>
          <td>Proteine</td>
          <td>Grassi</td>
          <td>Calorie</td>
          <td>Grammi</td>
          <td style="background-color: #9094b3;"></td>`
  return riga;
}

function generaNutrienti(alimenti) {
  let tb = document.querySelector('tbody'); // body tabella generata
  if (tb != null) {
    // tabella non vuota
    for (let row of tb.rows) { // per ogni riga della tabella
      for (let cell of row.cells) { // per ogni cella della riga
        let text = cell.textContent;
        if (!isNaN(text)) {
          // contenuto della cella è un numero
          if (cell.id == 'carboidrati') {
            carboidrati += parseFloat(text);
          }
          if (cell.id == 'grassi') {
            grassi += parseFloat(text);
          }
          if (cell.id == 'proteine') {
            proteine += parseFloat(text);
          }
          if (cell.id == 'calorie') {
            calorie += parseFloat(text);
          }
        }
      }
    }
  }
  return [carboidrati, proteine, grassi, calorie];
}

function generaRighe(alimenti) {
  let righe = '';
  alimenti.forEach(alimento => { // una riga per ogni alimento
    let riga = `
        <tr>
          <td id="nome">${alimento.nome}</td>
          <td id="carboidrati">${(alimento.carboidrati / 100 * alimento.grammi).toFixed(2)}</td>
          <td id="proteine">${(alimento.proteine / 100 * alimento.grammi).toFixed(2)}</td>
          <td id="grassi">${(alimento.grassi / 100 * alimento.grammi).toFixed(2)}</td>
          <td id="calorie">${(alimento.calorie / 100 * alimento.grammi).toFixed(2)}</td>
          <td>${alimento.grammi}</td>
          <td class="bottoniTabella">
            <input type="text" style="text-align:right;" placeholder="g" data-val="${alimento.nome}" maxlength='5' size='2'>
            <button class="modifica-alimento button-13 mt-1" data-val="${alimento.nome}">Modifica</button>
            <button class="elimina-alimento button-13 mt-2" data-val="${alimento.nome}">Elimina</button>
          </td>
        </tr>
      `;
    righe += riga;
  });
  return righe;
}