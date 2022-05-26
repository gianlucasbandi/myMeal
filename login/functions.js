// event listener bottone LOGIN
document.querySelector('#loginButton').addEventListener('click', valida);

// zona messaggi dinamici
let messaggi = document.querySelector('#messaggi');

function valida() {
  let email = document.querySelector('#inputEmail').value; // email inserita
  if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
    // email non valida
    messaggi.innerHTML = '<p style="color:red;">email non valida</p>';
  }
  else {
    // email valida
    let password = document.querySelector('#inputPasswd').value; // password inserita

    let data = new FormData();
    data.append('inputEmail', email);
    data.append('inputPasswd', password);
    data.append('loginButton', 'accedi');
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
          else {
            // success
            window.location.replace('../index.php');
          }
        }
      })
      .catch((error) => {
        console.error('Errore: ', error);
      });
  }
}