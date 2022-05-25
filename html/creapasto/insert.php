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
$alimento = $_POST['alimento'];
$grammi = '100';

$queryalimento = "SELECT * FROM alimento WHERE nome=$1";
$querymenu = "SELECT * FROM menu WHERE utente=$1 AND 
                giorno=$2 AND mese=$3 AND anno=$4";
$querypasto = "SELECT * FROM pasto WHERE tipo=$1 AND menu_utente=$2 AND 
                menu_giorno=$3 AND menu_mese=$4 AND menu_anno=$5";
$queryformato = "SELECT * FROM formato WHERE alimento_nome=$1 AND pasto_tipo=$2 AND
                pasto_menu_utente=$3 AND pasto_menu_giorno=$4 AND pasto_menu_mese=$5
                AND pasto_menu_anno=$6";
$query1 = "INSERT INTO menu VALUES ($1,$2,$3,$4)";
$query2 = "INSERT INTO pasto VALUES ($1,$2,$3,$4,$5)";
$query3 = "INSERT INTO formato VALUES ($1,$2,$3,$4,$5,$6,$7)";

if ($result = pg_query_params($dbconn, $queryalimento, array($alimento))) {
    if (pg_numrows($result) > 0) {
        // alimento presente
        if ($result = pg_query_params(
            $dbconn,
            $querymenu,
            array($email, $giorno, $mese, $anno)
        )) {
            if (pg_numrows($result) < 1) {
                // menu non presente
                if ($result = pg_query_params(
                    $dbconn,
                    $query1,
                    array($email, $giorno, $mese, $anno)
                )) {
                    // menu inserito
                    if ($result = pg_query_params(
                        $dbconn,
                        $querypasto,
                        array($tipo, $email, $giorno, $mese, $anno)
                    )) {
                        if (pg_numrows($result) < 1) {
                            // pasto non presente
                            if ($result = pg_query_params(
                                $dbconn,
                                $query2,
                                array($tipo, $email, $giorno, $mese, $anno)
                            )) {
                                // pasto inserito
                                if ($result = pg_query_params(
                                    $dbconn,
                                    $queryformato,
                                    array($alimento, $tipo, $email, $giorno, $mese, $anno)
                                )) {
                                    if (pg_numrows($result) < 1) {
                                        // formato non presente
                                        if ($result = pg_query_params(
                                            $dbconn,
                                            $query3,
                                            array($alimento, $tipo, $email, $giorno, $mese, $anno, $grammi)
                                        )) {
                                            $data = ["messaggio" => "Riga inserita con successo"];
                                            echo json_encode($data);
                                        } else {
                                            echo "Errore nell'esecuzione di $query3" . pg_last_error();
                                        }
                                    } else {
                                        $data = ["messaggio" => "alimento già inserito"];
                                        echo json_encode($data);
                                    }
                                } else {
                                    echo "Errore nell'esecuzione di $queryformato" . pg_last_error();
                                }
                            } else {
                                echo "Errore nell'esecuzione di $query2" . pg_last_error();
                            }
                        } else {
                            // pasto già presente
                            if ($result = pg_query_params(
                                $dbconn,
                                $queryformato,
                                array($alimento, $tipo, $email, $giorno, $mese, $anno)
                            )) {
                                if (pg_numrows($result) < 1) {
                                    // formato non presente
                                    if ($result = pg_query_params(
                                        $dbconn,
                                        $query3,
                                        array($alimento, $tipo, $email, $giorno, $mese, $anno, $grammi)
                                    )) {
                                        $data = ["messaggio" => "Riga inserita con successo"];
                                        echo json_encode($data);
                                    } else {
                                        echo "Errore nell'esecuzione di $query3" . pg_last_error();
                                    }
                                } else {
                                    $data = ["messaggio" => "alimento già inserito"];
                                    echo json_encode($data);
                                }
                            } else {
                                echo "Errore nell'esecuzione di $queryformato" . pg_last_error();
                            }
                        }
                    } else {
                        echo "Errore nell'esecuzione di $querypasto" . pg_last_error();
                    }
                } else {
                    echo "Errore nell'esecuzione di $query1" . pg_last_error();
                }
            } else {
                // menu già presente
                if ($result = pg_query_params(
                    $dbconn,
                    $querypasto,
                    array($tipo, $email, $giorno, $mese, $anno)
                )) {
                    if (pg_numrows($result) < 1) {
                        // pasto non presente
                        if ($result = pg_query_params(
                            $dbconn,
                            $query2,
                            array($tipo, $email, $giorno, $mese, $anno)
                        )) {
                            // pasto inserito
                            if ($result = pg_query_params(
                                $dbconn,
                                $queryformato,
                                array($alimento, $tipo, $email, $giorno, $mese, $anno)
                            )) {
                                if (pg_numrows($result) < 1) {
                                    // formato non presente
                                    if ($result = pg_query_params(
                                        $dbconn,
                                        $query3,
                                        array($alimento, $tipo, $email, $giorno, $mese, $anno, $grammi)
                                    )) {
                                        $data = ["messaggio" => "Riga inserita con successo"];
                                        echo json_encode($data);
                                    } else {
                                        echo "Errore nell'esecuzione di $query3" . pg_last_error();
                                    }
                                } else {
                                    $data = ["messaggio" => "alimento già inserito"];
                                    echo json_encode($data);
                                }
                            } else {
                                echo "Errore nell'esecuzione di $queryformato" . pg_last_error();
                            }
                        } else {
                            echo "Errore nell'esecuzione di $query2" . pg_last_error();
                        }
                    } else {
                        // pasto già presente
                        if ($result = pg_query_params(
                            $dbconn,
                            $queryformato,
                            array($alimento, $tipo, $email, $giorno, $mese, $anno)
                        )) {
                            if (pg_numrows($result) < 1) {
                                // formato non presente
                                if ($result = pg_query_params(
                                    $dbconn,
                                    $query3,
                                    array($alimento, $tipo, $email, $giorno, $mese, $anno, $grammi)
                                )) {
                                    $data = ["messaggio" => "Riga inserita con successo"];
                                    echo json_encode($data);
                                } else {
                                    echo "Errore nell'esecuzione di $query3" . pg_last_error();
                                }
                            } else {
                                $data = ["messaggio" => "alimento già inserito"];
                                echo json_encode($data);
                            }
                        } else {
                            echo "Errore nell'esecuzione di $queryformato" . pg_last_error();
                        }
                    }
                } else {
                    echo "Errore nell'esecuzione di $querypasto" . pg_last_error();
                }
            }
        } else {
            echo "Errore nell'esecuzione di $querymenu" . pg_last_error();
        }
    } else {
        $data = ["messaggio" => "Alimento non presente nel database"];
        echo json_encode($data);
    }
} else {
    echo "Errore nell'esecuzione di $queryalimento" . pg_last_error();
}
