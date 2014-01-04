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
			if(currenttemp < 100) {
				currenttemp+=1;		
				document.getElementById(temp).innerHTML = currenttemp + "ºC";				
			}
		}

		function decTemp(temp) {
			var currenttempstr = document.getElementById(temp).innerHTML.split("ºC");
			var currenttemp = parseFloat(currenttempstr[0]);
			if(currenttemp > -100) {
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
				z-index: 1;
				background-color: #112211;
				color: #94c600;
				font-family: "Lucida Console", Monaco, monospace;
				font-size: 20pt;
				font-weight: bold;
				left: 35%;
				padding: 5px;
				border: solid 2px #001100;				
			}

			#tcongelador {
				top: 5%;

				
			}

			#tfrigorifico {
				top: 40%;
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
												<!-- <div style="position: relative;">													
													<div id="TVbuttons"> -->
														<table height="100%">
															<tr height="30%">
																<td>
																	<input type="button" name="cplus" value="+" id="cplusButton" class="loginButtons" 
																		onclick="incTemp('tcongelador'); updateCTempDB('cf1', 'tcongelador');"/>
																	<input type="button" name="cminus" value="-" id="cminusButton" class="loginButtons" 
																		onclick="decTemp('tcongelador'); updateCTempDB('cf1', 'tcongelador');"/>
																</td>
															</tr>
															<tr height="30%">
																<td>
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
													<!--</div>	
												</div> -->
											</td>
										</tr>
									</table>

								</td></tr>
								<tr id="rodape"><td>
									<div id="error">&nbsp;</div>
								</td></tr>			

							</table>

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