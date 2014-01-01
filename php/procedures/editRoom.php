<?php
	$name=$_POST['name'];
	$image=$_POST['image'];
	$divisao=$_POST['divisao'];


	require 'connection.php';
	pg_query("UPDATE divisao SET dNome='$name', dIcon='$image' WHERE dID = '$divisao';");
	pg_free_result($user);
	pg_close();
?>