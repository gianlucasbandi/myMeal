// event listener bottone REGISTRAZIONE
document.querySelector('#registrationButton').addEventListener('click', valida);

// zona messaggi dinamici
let messaggi = document.querySelector('#messaggi');

function valida() {
    let nome = document.querySelector('#inputNome').value; // nome inserito
    if (nome == '') {
        // campo nome vuoto
        messaggi.innerHTML = '<p style="color:red;">Inserisci il nome</p>';
    }
    else {
        let cognome = document.querySelector('#inputCognome').value; // cognome inserito
        if (cognome == '') {
            // campo cognome vuoto
            messaggi.innerHTML = '<p style="color:red;">Inserisci il cognome</p>';
        }
        else {
            let email = document.querySelector('#inputEmail').value; // email inserita
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
                // email non valida
                messaggi.innerHTML = '<p style="color:red;">email non valida</p>';
            }
            else {
                // nome, cognome e email validi
                let password = document.querySelector('#inputPasswd').value; // password inserita

                let data = new FormData();
                data.append('inputNome', nome);
                data.append('inputCognome', cognome);
                data.append('inputEmail', email);
                data.append('inputPasswd', password);
                data.append('registrationButton', 'accedi');
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
        }
    }
}