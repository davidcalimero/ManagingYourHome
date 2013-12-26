<?php

	$nick=$_POST['nick'];
	$pass=$_POST['pass'];

	require 'connection.php';
	$user = pg_query("SELECT * FROM utilizador WHERE uID = '$nick' AND palavraPasse = '$pass';");
	if(pg_num_rows($user) > 0){
		$r = pg_query("SELECT login('$nick');");
		echo "Sessão iniciada com sucesso";
	}
	else echo "Combinação de nome de utilizador e palavra-passe não existente";
	pg_free_result($user);
	pg_free_result($r);
	pg_close();
?>