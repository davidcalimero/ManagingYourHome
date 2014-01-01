<?php
	$divisao=$_POST['divisao'];

	require 'connection.php';
	$result = pg_query("SELECT dIcon FROM divisao WHERE dID = '$divisao';");
	foreach (pg_fetch_assoc($result) as $value)
		$icon = $value;
	echo $icon;
	pg_free_result($user);
	pg_close();
?>