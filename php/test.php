<?php
	require 'connection.php';
	$query = "SELECT dIcon FROM divisao WHERE dID = 'sala'";
	$result = pg_query($query) or die(pg_last_error());
	foreach (pg_fetch_assoc($result) as $value){
		echo "<img src=\"$value\"></img>";
	}
	pg_free_result($result);
	pg_close();
?>