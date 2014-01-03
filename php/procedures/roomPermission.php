<?php 
	$divisao=$_POST['divisao'];

	require 'connection.php';

	$query = "SELECT uID FROM login WHERE uID = 'admin';";
	$result = pg_query($query) or die(pg_last_error());
	if(pg_num_rows($result) == 0)
		echo "Inicie sessão como administrador para editar esta secção";
	else {
		$query = "SELECT uID FROM utilizador EXCEPT (SELECT uID FROM acede WHERE dID = '$divisao') ORDER BY uID;";
		$result = pg_query($query) or die(pg_last_error());
		echo "<table width=\"90%\"><tr><td width=\"15%\" valign=\"top\" align=\"center\"><table id=\"semPermissao\" class=\"permissoes\" border=\"0\" ><tr><th>Sem Permissões</th></tr>";
		while($value = pg_fetch_array($result))
			echo "<tr class=\"pessoaSem\"><td>" . $value[0] . "</td></tr>";
		echo "</table></td>";
		pg_free_result($result);

		echo "<td width=\"25%\" align=\"center\"><table id=\"avisoPermissoes\"><tr><td>Toque num nome para alterar as respectivas permissões</td></tr></table></td>";

		$query = "SELECT uID FROM acede WHERE dID = '$divisao' ORDER BY uID;";
		$result = pg_query($query) or die(pg_last_error());
		echo "<td width=\"15%\" valign=\"top\" align=\"center\"><table id=\"comPermissao\" class=\"permissoes\" border=\"0\"><tr><th>Com Permissões</th></tr>";
		while($value = pg_fetch_array($result))
			if($value[0] != 'admin')
				echo "<tr class=\"pessoaCom\"><td>" . $value[0] . "</td></tr>";
		echo "</table></td></tr></table>";
		pg_free_result($result);
	}

	pg_close();
?>