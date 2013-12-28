<!-- *********************************************************************** -->
<!-- ************************ Managing Your Home *************************** -->
<!-- *********************************************************************** -->


<!-- **************************** Grupo 302 ******************************** -->


<html>
	<head>

		<!-- Propriedades do documento -->
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">

		<!-- JQuery -->
		<script type="text/javascript" src="../scripts/jquery.js"></script>

		<!-- JavaScripts -->
		<script type="text/javascript" src="../scripts/scripts.js"></script>

		<title>Managing Your Home: Piso 0</title>
	</head>
	<body>
		<table width="100%" height="100%">
			<tr><td id="container">
				<table id="layout" border="0">
					<tr>
						<td id="sidebar">
							<div class="sbaritem" id="logo">
								<a href=""><img src="../media/img/minilogo.png"/></a>
							</div>

							<div class="sbaritem" id="logout">
								<a href="../index.html">
									<?php 
										require 'procedures/connection.php';
										$query = "SELECT uNome FROM utilizador NATURAL JOIN login;";
										$result = pg_query($query) or die(pg_last_error());
										foreach (pg_fetch_assoc($result) as $value)
											$nome = $value;
										$token = explode(' ',trim($nome));
										echo "Sair da sessão de " . $token[0];
										pg_free_result($result);
										pg_close();
									?>
								</a>
							</div>
						
							<div class="sbaritem" id="settings">
								<a href=""><img src="../media/img/definicoes.png"/></a>
							</div>
						
							<div class="sbaritem" id="help">
								<a href=""><img src="../media/img/ajuda.png"/></a>
							</div>
						</td>
						<td id="main">
							<div id="submain"> 

								<?php 
									function divisao($string) { 
										require 'procedures/connection.php';

										echo "<a href=\"" . $string . ".php\"><div class=\"item\" id=\"" . $string . "\"><img src=\"../media/img/";

										$query = "SELECT dIcon FROM divisao WHERE dID = '$string';";
										$result = pg_query($query) or die(pg_last_error());
										foreach (pg_fetch_assoc($result) as $value)
											$nome = $value;
										pg_free_result($result);

										echo $nome . "\"/><div class=\"caption\">";
									
										$query = "SELECT dNome FROM divisao WHERE dID = '$string';";
										$result = pg_query($query) or die(pg_last_error());
										foreach (pg_fetch_assoc($result) as $value)
											$nome = $value;
										pg_free_result($result);
									
										echo $nome . "</div></div></a>";
										pg_close();
									}

									divisao('quarto1');
									divisao('quarto2');
									divisao('sala');
									divisao('cozinha');
									divisao('casaBanho');
							 	?>

							 	<div class="itemContainer" id="planta">
									<img src="../media/img/Planta.png"/> 
								</div>
							</div>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>		

	</body>
</html>