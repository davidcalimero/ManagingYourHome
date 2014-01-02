<?php
	$name=$_POST['name'];
	$image=$_POST['image'];
	$divisao=$_POST['divisao'];
	$permissoes=$_POST['permissoes'];


	require 'connection.php';
	pg_query("DELETE FROM acede WHERE dID = '$divisao';");
	foreach($permissoes as $item)
    	pg_query("INSERT INTO acede VALUES ('$item', '$divisao');");
    pg_query("INSERT INTO acede VALUES ('admin', '$divisao');");
	pg_free_result($user);
	pg_close();
?>