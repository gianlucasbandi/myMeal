<!DOCTYPE html>
<html lang="it">
<head>
    <title>Area Personale</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user_email'])) {
            echo "ciao " . $_SESSION['name'];
        }
        else {
            echo $_SESSION['user_email'];
            echo 'Errore';
        }
    ?>
    <button><a href="./logout.php">logout</a></button>
</body>
</html>