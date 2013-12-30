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

		<title>Managing Your Home: Quarto</title>
	</head>
	<body>
		<table width="100%" height="100%">
			<tr><td id="container">
				<table id="layout" border="0">
					<tr>
						<td id="sidebar">
							
							<div class="sbaritem" id="sbarlogo">
								<a href="planta.php"><img src="../media/img/minilogo.png"/></a>
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
										echo $token[0];
										pg_free_result($result);
										pg_close();
									?>
									<br>
									<img src="../media/img/logout.png"/>
								</a>
							</div>
						
							<div class="sbaritem" id="edit">
								<a href=""><img src="../media/img/editar.png"/></a>
							</div>
						
							<div class="sbaritem" id="help">
								<a href="planta.php"><img src="../media/img/ajuda.png"/></a>
							</div>

						</td>
						<td id="main">
						<!-- ******************* -->
							<div class="path"><a href="planta.php"><img src="../media/img/seta.png"><span id="pathPlanta">Voltar à planta</span></a></div>
							<div id="submainDivision"> 
								<div class="itemContainer" id="fundoSala">
									<img src="../media/img/sala.png"/>
									<div id="fig">Frigorífico</div>	
								</div>
							</div>
						<!-- ******************* -->
						</td>
					</tr>
				</table>
			</td></tr>
		</table>		

	</body>
</html>