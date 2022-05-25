let inserisciBtn = document.querySelector('#nuova-riga');
let tabellaContainer = document.querySelector("#tabella-container");
inserisciBtn.addEventListener('click', inserisciAlimento);
let carboidrati = 0;
let grassi = 0;
let proteine = 0;
let calorie = 0;

// data di oggi per input data e mostra gli alimenti e azzerra nutrieni e calorie
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
  generaTabella();
});

// ricerca suggerimenti alimenti su db 
$(function () {
  $("#alimento").autocomplete({
    source: 'cercaAlimento.php',
  });
});

// aggiorna tabella al cambio data
document.querySelector("#data").addEventListener('change', aggiornaTabella);

// aggiorna tabella al cambio pasto
document.querySelector("#tipo").addEventListener('change', aggiornaTabella);

function inserisciAlimento() {
  if (document.querySelector('#alimento').value == '') {
    document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Seleziona un alimento da inserire!</p>';
  }
  else {
    document.querySelector('#messaggi').innerHTML = '';
    let formdata = new FormData(document.querySelector('#form'));
    fetch('./insert.php', {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: formdata
    })
      .then(response => response.json())
      .then(data => {
        if (data['messaggio'] == "Alimento non presente nel database") {
          document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Seleziona un alimento tra quelli presenti!</p>';
        } else {
          if (data['messaggio'] == "alimento già inserito") {
            document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Alimento già inserito!</p>';
          } else {
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
  data.append('data-val', e.target.getAttribute('data-val'));
  fetch('./delete.php', {
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

function modificaAlimento(e) {
  let id = e.target.getAttribute('data-val');
  let gr = document.querySelector(`[data-val='${id}']`).value;
  if (gr == '') {
    document.querySelector('#messaggi').innerHTML = '<p style="color:red;">Inserisci i grammi!</p>';
  }
  else {
    let data = new FormData(document.querySelector('#form'));
    data.append('peso', gr);
    data.append('cibo', id);
    fetch('./update.php', {
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
  tabellaContainer.innerHTML = "";
  generaTabella();
}

function generaTabella() {
  const formData = new FormData();
  formData.append('data', document.querySelector("#data").value);
  formData.append('tipo', document.querySelector("#tipo").value);
  fetch('./select.php', {
    method: 'POST',
    header: {
      'Content-Type': 'application/json'
    },
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
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
        tabellaContainer.innerHTML = tabella;
        let deleteBtn = document.querySelectorAll(".elimina-alimento");
        let updateBtn = document.querySelectorAll(".modifica-alimento");
        for (let i = 0; i < deleteBtn.length; i++) {
          deleteBtn[i].addEventListener('click', eliminaAlimento);
        }
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
  if (alimenti == '') {
    return 0,0,0,0;
  }
  else {
    let tb = document.querySelector('tbody');
    if(tb!=null){
      for (let row of tb.rows) {
        for (let cell of row.cells) {
          if (!isNaN(cell.textContent)) {
            if(cell.id=='carboidrati'){
              carboidrati += parseFloat(cell.textContent);
            }
            if(cell.id=='grassi'){
              grassi += parseFloat(cell.textContent);
            }
            if(cell.id=='proteine'){
              proteine += parseFloat(cell.textContent);
            }
            if(cell.id=='calorie'){
              calorie += parseFloat(cell.textContent);
            }
          }
        }
      } 
    }
    return [carboidrati,proteine,grassi,calorie];
  }
}

function generaRighe(alimenti) {
  let righe = '';
  alimenti.forEach(alimento => {
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