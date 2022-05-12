<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!isset($_POST["loginButton"])) {
            header("Location: ..");
        }
        else {
            $dbconn = pg_connect("host=localhost port=5432 
                dbname=mymeal user=postgres password=password")
                or die(pg_last_error());
            $email = $_POST["inputEmail"];
            $query = "SELECT * FROM utente WHERE email=$1";
            $result = pg_query_params($dbconn, $query, array($email));
            if (!$tuple=pg_fetch_array($result,null,PGSQL_ASSOC)) {
                echo "email non presente";
            }
            else {
                $passwd = md5($_POST["inputPasswd"]);
                $query2 = 'SELECT * FROM utente WHERE '. 
                           'email=$1 and passwd=$2';
                $result = pg_query_params($dbconn,$query2,
                            array($email,$passwd));
                if ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)) {
                    $nome = $tuple['nome'];
                    echo "Registrazione completata." . 
                    "Inizia <a href=../php/welcome.php?name=$nome> qui </a>"; 
                }
                else {
                    echo "Password errata";
                }
            }
        }
    ?>
</body>
</html>