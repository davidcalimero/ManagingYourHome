<?php
	$eID=$_POST['eID'];
	$v1=$_POST['v1'];

	require 'connection.php';


	$equip = pg_query("SELECT * FROM equipamento WHERE eID = '$eID';");
	if(pg_num_rows($equip) > 0){
		$r = pg_query("SELECT modifyV1('$eID', '$v1');");
	}
	pg_free_result($equip);
	pg_free_result($r);
	pg_close();
?>