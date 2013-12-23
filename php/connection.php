<?php
    $user = "ist166392";        /* username sigma */
    $host = "db.ist.utl.pt"; 
    $port = 5432; 
    $password = "inrq1320";     /* password psql_reset */ 
    $dbname = $user;            /* nome da BD = nome user */ 
    $connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
?>