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

		<title>Managing Your Home: Quarto</title>
	</head>
	<body>
		<table width="100%" height="100%">
			<tr><td id="container">
				<table id="layout" border="0">
					<tr>
						<td id="sidebar">
							<div class="sbaritem" id="sbarlogo">
								<img src="../media/img/minilogo.png"/>
							</div>

							<div class="sbaritem" id="logout">
								<?php 
										require 'procedures/connection.php';
										$query = "SELECT uNome FROM utilizador NATURAL JOIN login;";
										$result = pg_query($query) or die(pg_last_error());
										foreach (pg_fetch_assoc($result) as $value)
											$nome = $value;
										$token = explode(' ',trim($nome));
										echo $token[0];
										pg_free_result($result);
										pg_close();
									?><br>
									<img src="../media/img/logout.png"/>
							</div>
						
							<div class="sbaritem" id="edit">
								<img src="../media/img/editar.png"/>
							</div>
						
							<div class="sbaritem" id="help">
								<img src="../media/img/ajuda.png"/>
							</div>
						</td>
						<td id="main">
						<!-- ******************* -->
							<table id="currentLocation">
								<tr>
									<td id="dummy"><div class="back"><a href="planta.php"><img src="../media/img/seta.png"><span id="pathPlanta">Voltar</span></a></div></td>
									<td id="divisionTitle"><span id="path">Planta ► </span>
									<span id="location">
										<?php 
											require 'procedures/connection.php';
											$query = "SELECT dNome FROM divisao WHERE dID = 'quarto2';";
											$result = pg_query($query) or die(pg_last_error());
											foreach (pg_fetch_assoc($result) as $value)
												$nome = $value;
											echo $value;
											pg_free_result($result);
											pg_close();
										?>
									</span></td>
								</tr>
							</table>
							
							<div id="submainDivision"> 
								<div class="itemContainer" id="fundoQuarto2">
									<img src="../media/img/quarto2.jpg"/>
									<div id="fig">Frigorífico</div>	
								</div>
							</div>
						<!-- ******************* -->
						<div class="toggle" id="ajuda">ajuda</div>
						<div class="toggle" id="editar">editar</div>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>	

		<!-- JavaScripts -->
		<script type="text/javascript" src="../scripts/scripts.js"></script>	

	</body>
</html>