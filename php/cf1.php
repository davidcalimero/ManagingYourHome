<html>
	<head>

		<!-- Propriedades do documento -->
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">

		<!-- JQuery -->
		<script type="text/javascript" src="../scripts/jquery.js"></script>

		<title>Managing Your Home: Televisão</title>
	</head>


	<body>

		<script type="text/javascript">

		function incTemp(temp) {
			var currenttempstr = document.getElementById(temp).innerHTML.split("ºC");
			var currenttemp = parseFloat(currenttempstr[0]);
			if((temp == "tcongelador" && currenttemp < -16) || (temp == "tfrigorifico" && currenttemp < 6)) {
				currenttemp+=1;		
				document.getElementById(temp).innerHTML = currenttemp + "ºC";				
			}
		}

		function decTemp(temp) {
			var currenttempstr = document.getElementById(temp).innerHTML.split("ºC");
			var currenttemp = parseFloat(currenttempstr[0]);
			if((temp == "tcongelador" && currenttemp > -22) || (temp == "tfrigorifico" && currenttemp > 2)) {
				currenttemp-=1;		
				document.getElementById(temp).innerHTML = currenttemp + "ºC";				
			}
		}

		/* BD */
		function updateCTempDB(dbID, ctemp) {
			var newctempstr = document.getElementById(ctemp).innerHTML.split("ºC");
			var newctemp = parseFloat(newctempstr[0]);
			$.post('procedures/modifyV1.php',
			{
				eID: dbID,
				v1: newctemp
			});
		}

		function updateFTempDB(dbID, ftemp) {
			var newftempstr = document.getElementById(ftemp).innerHTML.split("ºC");
			var newftemp = parseFloat(newftempstr[0]);
			$.post('procedures/modifyV2.php',
			{
				eID: dbID,
				v2: newftemp
			});
		}

		</script>

		<style type="text/css">
		/* MOVER PARA O STYLESHEET! */

			#fridge_feedback {
				position: relative; 
				width: 41%; 
				max-height: 50%;
				margin-left: auto; 
				margin-right: auto;
			}

			#frigorifico {				
				position: relative; 				 
			}

			#frigorifico img {
				width: 100%; 
			} 

			.temperatura {
				position: absolute;
				width: 50%;
				z-index: 1;
				background-color: #112211;
				color: #94c600;
				font-family: "Lucida Console", Monaco, monospace;
				font-size: 20pt;
				font-weight: bold;
				left: 25%;
				padding: 5px;
				border: solid 3px #001100;
				text-align: right;
			}

			#tcongelador {
				top: 7%;

				
			}

			#tfrigorifico {
				top: 40%;
			}

			.fridgelabels {
				text-align: center;
				color: #112211;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16pt;
				font-weight: bold;
				padding-bottom: 2%;
			}

			


		</style>
		<!-- *************************************************************** -->

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
							<table id="sublayout">
								<tr id="cabecalho"><td>
									<div class="hcentered">	
										<table id="currentLocation">
											<tr>
												<td id="back" style="opacity: 100"><a href="cozinha.php"><img src="../media/img/seta.png"></a></td>
												<td id="divisionTitle"><span id="path">Planta ► <?php 
														require 'procedures/connection.php';
														$query = "select dNome from divisao NATURAL JOIN equipada where eID = 'cf1';";
														$result = pg_query($query) or die(pg_last_error());
														foreach (pg_fetch_assoc($result) as $value)
															$nome = $value;
														echo $value;
														pg_free_result($result);
														pg_close();
													?> ► </span>
												<span id="location"><?php 
														require 'procedures/connection.php';
														$query = "select eNome from equipamento where eID = 'cf1';";
														$result = pg_query($query) or die(pg_last_error());
														foreach (pg_fetch_assoc($result) as $value)
															$nome = $value;
														echo $value;
														pg_free_result($result);
														pg_close();
													?></span></td>
											</tr>
										</table>
									</div>
								</td></tr>
								<tr id="corpo"><td>	
								
									<table width="100%" height="100%">
										<tr>
											<td width="10%"></td>
											<td width="40%">        
												<div style="position: relative; ">
													<div id="fridge_feedback">
														<?php 
															require 'procedures/connection.php';

															$query = "select v1, v2 from equipamento where eID = 'cf1';";
															$result = pg_query($query) or die(pg_last_error());
															while ($value = pg_fetch_array($result)) {
																$tempcongelador = $value[0];
																$tempfrigorifico = $value[1];
															}
															pg_free_result($result);

															echo "<div id=\"tcongelador\" class=\"temperatura\">" . $tempcongelador . "ºC</div>";
															echo "<div id=\"tfrigorifico\" class=\"temperatura\">" . $tempfrigorifico . "ºC</div>";
															
														?>	
														<div id="frigorifico"><img src="../media/img/fridge.png"></div>															
													</div>
												</div>
											</td>
											<td width="50%">
													<table height="100%">
															<tr height="30%">
																<td><div class="fridgelabels">Congelador</div>
																	<input type="button" name="cplus" value="+" id="cplusButton" class="loginButtons" 
																		onclick="incTemp('tcongelador'); updateCTempDB('cf1', 'tcongelador');"/>
																	<input type="button" name="cminus" value="-" id="cminusButton" class="loginButtons" 
																		onclick="decTemp('tcongelador'); updateCTempDB('cf1', 'tcongelador');"/>
																</td>
															</tr>
															<tr height="30%">
																<td><div class="fridgelabels">Frigorífico</div>
																	<input type="button" name="fplus" value="+" id="fplusButton" class="loginButtons" 
																		onclick="incTemp('tfrigorifico'); updateFTempDB('cf1', 'tfrigorifico');"/>
																	<input type="button" name="fminus" value="-" id="fminusButton" class="loginButtons" 
																			onclick="decTemp('tfrigorifico'); updateFTempDB('cf1', 'tfrigorifico');"/>
																</td>
															</tr>
															<tr height="40%">
																<td>
																	&nbsp;
																</td>
															</tr>
													</table>
											</td>
										</tr>
									</table>
								
								</td></tr>
								<tr id="rodape"><td>
									<div id="error">&nbsp;</div>
								</td></tr>			

							</table>

							<div class="toggle" id="ajuda">
								<h1 class="settingsTitle">Ajuda</h1>
								<table width="100%" height="70%" style="text-align: center;">
									<tr>
										<td width="25%" height="50%">
											<div id="label1">
												<div class="videolabels">Editar Propriedades</div>
												<img border="2" width="80%" src="../media/img/ajuda1.png"/>
											</div>
											<div id="label2">
												<div class="videolabels">Editar Permissões</div>
												<img border="2" width="80%" src="../media/img/ajuda2.png"/>
											</div>
										</td>
										<td width="75%" height="50%">
											<div id="ajuda1">
												<div class="videoTitulo">Editar as propriedades de uma divisão ou equipamento</div>
												<video id="video1" width="90%" controls="controls">
										  			<source src="../media/video/ajuda1.mp4" type="video/mp4">
												</video>
											</div>
											<div id="ajuda2">
												<div class="videoTitulo">Editar as permissões de uma divisão ou equipamento</div>
												<video id="video2" width="90%" controls="controls">
										  			<source src="../media/video/ajuda2.mp4" type="video/mp4">
												</video>
											</div>
										</td>
									</tr>
								</table>
							</div>

							<!-- editar____________________________ -->
							<div class="toggle" id="editar">
								<div><h1 class="settingsTitle">Editar</h1></div>
								<form name="changeForm">
									<table class="editTable" border="0" width="100%">
										<tr>
											<td width="35%" class="loginLabel">Nome da divisão:</td>
											<td>
												<?php 
													echo "<input type=\"text\" name=\"nameDivision\" value=";
													require 'procedures/connection.php';
													$query = "SELECT eNome FROM equipamento WHERE eID = 'cf1';";
													$result = pg_query($query) or die(pg_last_error());
													foreach (pg_fetch_assoc($result) as $value)
														$nome = $value;
													echo "\"" . $value . "\"" ;
													pg_free_result($result);
													pg_close();
													echo "id=\"nomeDivisao\" class=\"loginFields\"/>";
												?>
											</td>
										</tr>
										<tr>
											<td width="35%" class="loginLabel">Permissões:</td>
											<td><div id="permissoesDivisao"></div></td>
										</tr>
										<tr><td colspan="2" class="loginButtons">
											<input type="button" name="alterarDivisao" value="Guardar" id="saveAD" class="loginButtons" onclick="saveEdit('cf1','utiliza','eID');"/> 
											<input type="reset" name="cancelar" value="Repor" id="cancelAD" class="loginButtons" onclick="cancelEdit('cf1','utiliza','eID');"/>
										</td></tr>
									</table>
								</form>
							</div>
							<!-- __________________________________ -->
						</td>
					</tr>
				</table>
			</td></tr>
		</table>
	<!-- JavaScripts -->
		<script type="text/javascript" src="../scripts/scripts.js"></script>		

	</body>
</html>