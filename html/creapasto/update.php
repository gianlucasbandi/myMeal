<?php
require_once('../../php/config.php');
session_start();

if (!isset($_SESSION['user_email'])) {
    header("location: ..");
}

$email = $_SESSION['user_email'];
$date = explode('-', $_POST['data']);
$giorno = $date[2];
$mese = $date[1];
$anno = $date[0];
$tipo = $_POST['tipo'];
$alimento = $_POST['data-val'];
$grammi = $_POST['grammi'];

$query = "UPDATE formato SET alimento_grammi = $1 WHERE alimento_nome=$2 AND pasto_tipo=$3
          AND pasto_menu_utente=$4 AND pasto_menu_giorno=$5 AND pasto_menu_mese=$6
          AND pasto_menu_anno=$7";

if ($result = pg_query_params($dbconn, $query, array($grammi, $alimento, $tipo, $email, $giorno, $mese, $anno))) {
    $data = ["messaggio" => "Riga eliminata con successo"];
    echo json_encode($data);
} else {
    echo "Errore nell'esecuzione di $query" . pg_last_error();
}

?>
