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
              <td>Carboidrati</td>
              <td>Proteine</td>
              <td>Grassi</td>
              <td>Calorie</td>
            </tr>
          </thead>
          <tbody>
            ${generaRighe(data)}
          </tbody>
        </table>
        `;
      tabellaContainer.innerHTML = tabella;
      let deleteBtn = document.querySelectorAll(".elimina-alimento");
      let updateBtn = document.querySelectorAll(".update-alimento");
      for(let i = 0; i < deleteBtn.length; i++){
        deleteBtn[i].addEventListener('click',eliminaAlimento);
      }
      for(let i = 0; i < updateBtn.length; i++){
        updateBtn[i].addEventListener('click',modificaAlimento);
      }
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
          <td>${alimento.carboidrati}</td>
          <td>${alimento.proteine}</td>
          <td>${alimento.grassi}</td>
          <td>${alimento.calorie}</td>
          <td>
            <input type="text" placeholder="g" data-val="${alimento.nome} id="grammi" maxlength='5' size='2'>
            <button class="modifica-alimento" data-val="${alimento.nome}">Modifica</button>
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
    source: 'select.php',
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

function eliminaAlimento(e){
  let data = new FormData(document.querySelector('#form'));
  data.append('data-val',e.target.getAttribute('data-val'));
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

function modificaAlimento(e){
  let data = new FormData(document.querySelector('#form'));
  let id = e.target.getAttribute('data-val');
  data.append('peso', document.querySelector('#grammi '));
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

function aggiornaTabella() {
  let tabella = document.querySelector('table');
  tabellaContainer.innerHTML = "";
  generaTabella();
}