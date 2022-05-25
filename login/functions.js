document.querySelector('#loginButton').addEventListener('click',valida);
let messaggi = document.querySelector('#messaggi');

function valida() {
    let data = new FormData();
    data.append('inputEmail',document.querySelector('#inputEmail').value);
    data.append('inputPasswd',document.querySelector('#inputPasswd').value);
    data.append('loginButton','accedi');
    fetch('./validateLogin.php', {
      method: 'POST',
      header: {
        'Content-Type': 'application/json'
      },
      body: data
    })
      .then(response => response.json())
      .then(data => {
        if (data['messaggio'] == "Password errata") {
            messaggi.innerHTML = '<p style="color:red;">Password errata</p>';
        }
        else {
            if (data['messaggio'] == "email non presente") {
                messaggi.innerHTML = '<p style="color:red;">Email non presente</p>';
            }
            else{
                window.location.replace('../index.php');
            }
        }
      })
      .catch((error) => {
        console.error('Errore: ', error);
      });
  }