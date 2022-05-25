<?php
require_once('../../php/config.php');
session_start();
if (!isset($_SESSION['user_email'])) {
    header("location: ../../index.php");
}
    $search = strtoupper($_GET['term']);
    $query = "SELECT * FROM alimento WHERE nome LIKE '{$search}%' LIMIT 15";
    $result = pg_query($dbconn, $query);
    if (pg_numrows($result) > 0) {
        while ($alimento = pg_fetch_array($result)) {
            $res[] = $alimento['nome'];
        }
    } else {
        $res = array();
    }
    //return json res
    echo json_encode($res);
?>