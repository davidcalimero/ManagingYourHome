<?php
	$eID=$_POST['eID'];
	$v2=$_POST['v2'];

	require 'connection.php';


	$equip = pg_query("SELECT * FROM equipamento WHERE eID = '$eID';");
	if(pg_num_rows($equip) > 0){
		$r = pg_query("SELECT modifyV2('$eID', '$v2');");
	}
	pg_free_result($equip);
	pg_free_result($r);
	pg_close();
?>