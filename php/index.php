<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
       $dbconn = pg_connect("host=localhost port=5432
       dbname=postgres user=postgres password=password")
       or die(pg_last_error());
       $query = "SELECT * FROM alimento";
       $result = pg_query($dbconn, $query);
       echo "<table>\n";
       while($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach($tuple as $value) {
                echo "\t\t<td class=\"cell\">";
                echo "$value";
                echo "</td>\n";
           }
           echo "\t</tr>\n";
       }
       echo "</table>";
       pg_free_result($result);
       pg_close($dbconn);
    ?> 
</body>
</html>