<?php
	$nick=$_POST['nick'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];

	require 'connection.php';
	$user = pg_query("SELECT * FROM utilizador WHERE uID = '$nick';");
	if(pg_num_rows($user) == 0)
		pg_query("INSERT INTO utilizador VALUES ('$nick', '$name', '$pass');");
	else echo "Nome de utilizador já existente";
	pg_free_result($user);
	pg_close();
?>