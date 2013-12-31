<html>
	<head>

		<!-- Propriedades do documento -->
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">

		<!-- JQuery -->
		<script type="text/javascript" src="../scripts/jquery.js"></script>

		<title>Managing Your Home: Luz 1</title>
	</head>
	<body>
		
		<!-- *************************************************************** -->
		<script type="text/javascript">
		/* MOVER PARA O SCRIPTS */

			/* Actualiza cor da lampada */
			function updateLight(lightsource, alfavalue) {
				var newlight = "rgba(100%, 100%, 0%," + alfavalue / 100.0 + ")";
				document.getElementById("value").innerHTML = alfavalue + "%";
				$(lightsource).css('background', newlight);				
			}
		</script>

		<!-- *************************************************************** -->

		<style type="text/css">
		/* MOVER PARA O STYLESHEET! */

			/* Light Slider */
			input[type="range"]#light_slider {
			    -webkit-appearance: none;
			    background-color: #112211;
			    width: 200px;
			    height: 20px;			    
			    -webkit-transform:rotate(-90deg);       
			    -moz-transform:rotate(-90deg);
			    -o-transform:rotate(-90deg);
			    -ms-transform:rotate(-90deg);
			    transform:rotate(-90deg); 
			    z-index: 0;
			}

			input[type="range"]#light_slider::-webkit-slider-thumb {
			    -webkit-appearance: none;			    
			    background-color: #44AA11;
			    opacity: 1.0;
			    width: 25px;
			    height: 50px;
			}

			/* Lampada */
			#lampada {
				
				position: absolute; 
				z-index: 1; 
				background-color: #FFFF00;
			}

			#lampada img {
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
												<td id="divisionTitle"><span id="path">Planta ► </span>
												<span id="location">
													<?php 
														require 'procedures/connection.php';
														$query = "SELECT dNome FROM divisao WHERE dID = 'cozinha';";
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
									</div>
								</td></tr>
								<tr id="corpo"><td>	

									<table width="100%" height="100%">
										<tr>
											<td width="50%">        
												<div style="position: relative; max-width: 25%">                            			

													<!-- id vindo da bd -->
													<div id="lampada" width="100%" height="100%">
														<img src="../media/img/lampada.png"/><br>
														<div id="value">100%</div>
													</div>
												</div>
											</td>
											<td width="50%" style="background-color: #0055FF;">
												<div style="position: relative;">
													<input id="light_slider" type="range" name="light" 
															min="0" max="100" value="100" 
															onchange="updateLight('#lampada', this.value)">
																
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