<?php
    if (!isset($_POST["registrationButton"])) {
        header("Location: ../index.php");
    }
    else {
        include('../php/config.php');
        $email = $_POST["inputEmail"];
        $query = "SELECT * FROM utente WHERE email=$1";
        $result = pg_query_params($dbconn, $query, array($email));
        if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)) {
            echo "email già presente";
        }
        else {
            $nome = $_POST["inputNome"];
            $cognome = $_POST["inputCognome"];
            $email = $_POST["inputEmail"];
            $passwd = md5($_POST["inputPasswd"]);
            $query2 = 'INSERT INTO utente VALUES ($1,$2,$3,$4)';
            $result = pg_query_params($dbconn,$query2,
                array($nome,$cognome,$email,$passwd));
            if ($result) {
                session_start();
                $_SESSION['user_email'] = $email;
                $_SESSION['name'] = $nome;
                header("location: ..");
            }
            else {
                echo "Errore";
            }
        }
    }
?>