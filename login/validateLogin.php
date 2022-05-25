<?php
    if (!isset($_POST["loginButton"])) {
        header("Location: ../index.php");
    } else {
        include('../php/config.php');
        $email = $_POST["inputEmail"];
        $query = "SELECT * FROM utente WHERE email=$1";
        $result = pg_query_params($dbconn, $query, array($email));
        if (!$tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $messaggio = ["messaggio" => "email non presente"];
            echo json_encode($messaggio);
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
                $messaggio = ["messaggio" => "ok"];
                echo json_encode($messaggio);
            } else {
                $messaggio = ["messaggio" => "Password errata"];
                echo json_encode($messaggio);
            }
        }
    }
?>
