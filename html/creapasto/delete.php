<?php
require_once('../../php/config.php');
session_start();
if (!isset($_SESSION['user_email'])) {
    header("location: ../../index.php");
}

$email = $_SESSION['user_email'];
$date = explode('-', $_POST['data']);
$giorno = $date[2];
$mese = $date[1];
$anno = $date[0];
$tipo = $_POST['tipo'];
$alimento = $_POST['data-val'];

$query = "DELETE FROM formato WHERE alimento_nome=$1 AND pasto_tipo=$2 AND
            pasto_menu_utente=$3 AND pasto_menu_giorno=$4 AND pasto_menu_mese=$5
            AND pasto_menu_anno=$6";

if ($result = pg_query_params($dbconn, $query, array($alimento, $tipo, $email, $giorno, $mese, $anno))) {
    $data = ["messaggio" => "Riga eliminata con successo"];
    echo json_encode($data);
} else {
    echo "Errore nell'esecuzione di $query" . pg_last_error();
}

?>
