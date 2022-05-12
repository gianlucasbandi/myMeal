<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (!isset($_POST["registrationButton"])) {
        header("Location: ..");
    }
    else {
        $dbconn = pg_connect("host=localhost port=5432 
            dbname=mymeal user=postgres password=password")
            or die(pg_last_error());
        $email = $_POST["inputEmail"];
        $query = 'SELECT * FROM utente WHERE email=$1';
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
                echo "Registrazione completata." . 
                    "Inizia <a href=\"../index.html\"> qui </a>"; 
            }
            else {
                echo "Errore";
            }
        }
    }
?>
</body>
</html>