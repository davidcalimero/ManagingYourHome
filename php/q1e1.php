<html>
	<head>

		<!-- Propriedades do documento -->
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">

		<!-- JQuery -->
		<script type="text/javascript" src="../scripts/jquery.js"></script>

		<script type="text/javascript">
			/* Actualiza altura do estore na BD */
			function updateBlindDB(dbID) {
				var lastValue = document.getElementById("blind_slider").value;
			//	document.getElementById("error").innerHTML = lastValue; // DEBUG
				$.post('procedures/modifyV1.php',
				{
					eID: dbID,
					v1: lastValue
				});
			}
		</script>

		<title>Managing Your Home: Estore 1</title>
	</head>


	<body onbeforeunload="updateBlindDB('q1e1')">

		<!-- *************************************************************** -->
		<script type="text/javascript">
		/* MOVER PARA O SCRIPTS */

			/* Actualiza altura do estore */
			function updateBlind(blindcurtain, newheight) {
			//	var newscale = "scaleY(" + newheight + ")";
			//	var newtranslation = "translateY(" + newheight + ")";
				document.getElementById("value").innerHTML = newheight + "%";
				$(blindcurtain).css('height', newheight);	
			//	$(blindcurtain).css('transform', newtranslation);	
			}			
		</script>

		<!-- *************************************************************** -->

		<style type="text/css">
		/* MOVER PARA O STYLESHEET! */

			/* Light Slider */
			input[type="range"]#blind_slider {
			    -webkit-appearance: none;
			    background-color: #112211;
			    width: 200px;
			    height: 20px;			    
			    -webkit-transform:rotate(90deg);       
			    -moz-transform:rotate(90deg);
			    -o-transform:rotate(90deg);
			    -ms-transform:rotate(90deg);
			    transform:rotate(90deg); 
			    z-index: 0;
			}

			input[type="range"]#blind_slider::-webkit-slider-thumb {
			    -webkit-appearance: none;			    
			    background-color: #44AA11;
			    opacity: 1.0;
			    width: 25px;
			    height: 50px;
			}

			/* Estore */

			#estore_q1e1 {
				background-color: #555555;
				position: relative;
				width: 100%;
			}

			#estore {				
				position: absolute; 
				z-index: 1; 
			}

			#estore img {
				width: 100%; 
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
												<td id="back" style="opacity: 100"><a href="planta.php"><img src="../media/img/seta.png"></a></td>
												<td id="divisionTitle"><span id="path">Planta ► <?php 
														require 'procedures/connection.php';
														$query = "select dNome from divisao NATURAL JOIN equipada where eID = 'q1e1';";
														$result = pg_query($query) or die(pg_last_error());
														foreach (pg_fetch_assoc($result) as $value)
															$nome = $value;
														echo $value;
														pg_free_result($result);
														pg_close();
													?> ► </span>
												<span id="location"><?php 
														require 'procedures/connection.php';
														$query = "select eNome from equipamento where eID = 'q1e1';";
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
											<td width="50%">        
												<div style="position: relative; max-width: 25%">
													<div id="estore_q1e1">&nbsp;</div>                        			
													<div id="estore" width="100%" height="100%">
													<?php 
															require 'procedures/connection.php';

															$query = "select v1 from equipamento where eID = 'q1e1';";
															$result = pg_query($query) or die(pg_last_error());
															foreach (pg_fetch_assoc($result) as $value)
																$valor = $value;
															pg_free_result($result);

															echo "<img src=\"../media/img/janelaAberta.png\" onload=\"updateBlind('#estore_q1e1', " . $valor . ")\"><br>";
														?>
														<div id="value">&nbsp;</div>
													</div>
												</div>
											</td>
											<td width="50%" style="background-color: #0055FF;">
												<div style="position: relative;">

													<?php 
															echo "<input id=\"blind_slider\" type=\"range\" name=\"blind\" 
															min=\"0\" max=\"100\" value=\"" . $value . "\" 
															onchange=\"updateBlind('#estore_q1e1', this.value)\">";
													?>
														
												</div> 
											</td>
										</tr>
									</table>

								</td></tr>
								<tr id="rodape"><td style="background-color: #AACC00;">
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