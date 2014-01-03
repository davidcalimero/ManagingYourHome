<?php
	$name=$_POST['name'];
	$image=$_POST['image'];
	$elemento=$_POST['elemento'];
	$permissoes=$_POST['permissoes'];
	$tabela=$_POST['tabela'];
	$id=$_POST['id'];


	require 'connection.php';
	if($id == 'dID') 
		pg_query("UPDATE divisao SET dNome='$name', dIcon='$image' WHERE dID = '$elemento';");
	else 
		pg_query("UPDATE equipamento SET eNome='$name' WHERE eID = '$elemento';");
	pg_query("DELETE FROM $tabela WHERE $id = '$elemento';");
	foreach($permissoes as $item)
    	pg_query("INSERT INTO $tabela VALUES ('$item', '$elemento');");
    pg_query("INSERT INTO $tabela VALUES ('admin', '$elemento');");
	pg_close();
?>