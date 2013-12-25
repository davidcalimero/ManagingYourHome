<?php
	require 'connection.php';
	$imgpath ='../media/img/';
	$query = "SELECT dIcon FROM divisao WHERE dID = 'sala'";
	$result = pg_query($query) or die(pg_last_error());
	foreach (pg_fetch_assoc($result) as $value){
		$fullpath = $imgpath . $value;
		#echo $fullpath;
		echo "<img src=\"$fullpath\"/>";
	}
	pg_free_result($result);
	pg_close();
?>