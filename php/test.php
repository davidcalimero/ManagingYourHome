<?php

require 'connection.php';

$result = pg_query("SELECT dNome from divisao WHERE dID = 'sala';") or die(pg_last_error());
echo "nome: $result"

?>