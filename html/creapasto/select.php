<?php

require_once('../../php/config.php');
session_start();

if (!isset($_SESSION['user_email'])) {
  header("location: ..");
}

$email = $_SESSION['user_email'];
if (isset($_POST['data'])) {
  $date = explode('-', $_POST['data']);
} else {
  $date = explode('-', $_GET['term']);
}
$giorno = $date[2];
$mese = $date[1];
$anno = $date[0];
$query = "SELECT nome,peso,carboidrati,proteine,grassi,calorie
          FROM formato, alimento
          WHERE alimento_nome=nome AND pasto_menu_utente=$1 AND 
                pasto_menu_giorno=$2 AND pasto_menu_mese=$3 AND
                pasto_menu_anno=$4";

if ($result = pg_query_params($dbconn, $query, array($email, $giorno, $mese, $anno))) {
  $data = [];
  while ($tupla = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    $tmp;
    $tmp['nome'] = $tupla['nome'];
    $tmp['carboidrati'] = $tupla['carboidrati'];
    $tmp['proteine'] = $tupla['proteine'];
    $tmp['grassi'] = $tupla['grassi'];
    $tmp['calorie'] = $tupla['calorie'];
    array_push($data, $tmp);
  }
  echo json_encode($data);
} else {
  echo "Errore nell'esecuzione di $query" . pg_last_error();
}

?>