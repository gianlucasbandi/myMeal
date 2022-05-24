<?php
    if (!isset($_POST["loginButton"])) {
        header("Location: ..");
    } else {
        include('../php/config.php');
        $email = $_POST["inputEmail"];
        $query = "SELECT * FROM utente WHERE email=$1";
        $result = pg_query_params($dbconn, $query, array($email));
        if (!$tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "email non presente";
        } else {
            $passwd = md5($_POST["inputPasswd"]);
            $query2 = 'SELECT * FROM utente WHERE ' .
                'email=$1 and passwd=$2';
            $result = pg_query_params(
                $dbconn,
                $query2,
                array($email, $passwd)
            );
            if ($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $nome = $tuple['nome'];
                session_start();
                $_SESSION['user_email'] = $email;
                $_SESSION['name'] = $nome;
                header("location: ..");
            } else {
                echo "Password errata";
                //scrivere innerhtml con password errata
            }
        }
    }
?>
