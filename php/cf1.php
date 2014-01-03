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

		<style type="text/css">
		/* MOVER PARA O STYLESHEET! */

			#fridge_feedback {
				position: relative; 
				width: 42%; 
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
												<div style="position: relative;">
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


															
														?>	
														<div id="frigorifico"><img src="../media/img/fridge.png"></div>															
													</div>
												</div>
											</td>
											<td width="50%" style="background-color: #0055FF;">
												<div style="position: relative;">													
													<div id="TVbuttons">
														
													</div>
													
													
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