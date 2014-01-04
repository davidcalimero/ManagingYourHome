<?php 
	$elemento=$_POST['elemento'];
	$id=$_POST['id'];

	require 'connection.php';

	if($id == 'dID'){
		$query = "SELECT uNome FROM utilizador NATURAL JOIN login;";
		$result = pg_query($query) or die(pg_last_error());
		foreach (pg_fetch_assoc($result) as $value)
			$nome = $value;
		$token = explode(' ',trim($nome));
		pg_free_result($result);

		$query = "SELECT dNome FROM divisao WHERE dID = '$elemento';";
		$result = pg_query($query) or die(pg_last_error());
		foreach (pg_fetch_assoc($result) as $value)
			$dNome = $value;
		pg_free_result($result);

		$query = "SELECT uID FROM login NATURAL JOIN acede WHERE dID = '$elemento';";
	}
	else {
		$query = "SELECT uNome FROM utilizador NATURAL JOIN login;";
		$result = pg_query($query) or die(pg_last_error());
		foreach (pg_fetch_assoc($result) as $value)
			$nome = $value;
		$token = explode(' ',trim($nome));
		pg_free_result($result);

		$query = "SELECT eNome FROM equipamento WHERE eID = '$elemento';";
		$result = pg_query($query) or die(pg_last_error());
		foreach (pg_fetch_assoc($result) as $value)
			$dNome = $value;
		pg_free_result($result);

		$query = "SELECT uID FROM login NATURAL JOIN utiliza WHERE eID = '$elemento';";
	}

	$result = pg_query($query) or die(pg_last_error());
	if(pg_num_rows($result) == 0)
		echo $token[0] . " não tem permissão para aceder a " . $dNome;
	pg_free_result($result);
	
	pg_close();
?>