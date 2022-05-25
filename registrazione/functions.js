document.querySelector('#registrationButton').addEventListener('click',valida);
let messaggi = document.querySelector('#messaggi');

function valida() {
    let data = new FormData();
    data.append('inputNome',document.querySelector('#inputNome').value);
    data.append('inputCognome',document.querySelector('#inputCognome').value);
    data.append('inputEmail',document.querySelector('#inputEmail').value);
    data.append('inputPasswd',document.querySelector('#inputPasswd').value);
    data.append('registrationButton','accedi');
    fetch('./validateRegistration.php', {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: data
    })
      .then(response => response.json())
      .then(data => {
        if (data['messaggio'] == "email già presente") {
            messaggi.innerHTML = '<p style="color:red;">email già presente</p>';
        }
        else {
            window.location.replace('../index.php');
        }
      })
      .catch((error) => {
        console.error('Errore: ', error);
      });
  }