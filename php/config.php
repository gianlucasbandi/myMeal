<?php
    $host = "localhost";
    $port = "5432";
    $user = "postgres";
    $password = "password";
    $dbname = "mymeal";

    $dbconn = pg_connect("host=$host port=$port 
    dbname=$dbname user=$user password=$password")
    or die(pg_last_error());
?>