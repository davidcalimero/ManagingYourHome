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

		<title>Managing Your Home: Piso 0</title>
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
						
							<div class="sbaritem" id="settings">
								<img src="../media/img/definicoes.png"/>
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
												<td id="back" style="opacity: 0"><a href="planta.php"><img src="../media/img/seta.png"></a></td>	
												<td id="divisionTitle"><span id="location">Planta</span></td>
											</tr>
										</table>
									</div>
								</td></tr>
								<tr id="corpo"><td>
									<div class="hcentered">	
										<div id="submain"> 
											<?php 
												function divisao($string) { 
													require 'procedures/connection.php';

													echo "<div class=\"item\" id=\"" . $string . "\" onClick=\"verificaPermissao('" . $string . "','dID');\"><img src=\"../media/img/";
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
													
													echo $nome . "</div></div>";
													pg_close();
												}
												divisao('quarto1');
												divisao('quarto2');
												divisao('sala');
												divisao('cozinha');
												divisao('casaBanho');
										 	?>
										 	<div id="planta">
												<img src="../media/img/Planta.png"/> 
											</div>
										</div>
									</div>
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
							<div class="toggle" id="definicoes">
								<h1 class="settingsTitle">Definições</h1>
								<table class="settingsTable">
									<tr>
										<td class="loginLabel">Volume:</td>
										<td><input  type="range" id="volume_set_slider" min="0" max="100" value="25" class="loginFields"/></td>
									</tr>
									<tr>
										<td class="loginLabel">Idioma:</td>
										<td><img class="acessibilidade" width="30%" src="../media/img/pt-pt.png"/></td>
									</tr>
									<tr>
										<td class="loginLabel">Modo de acessibilidade:</td>
										<td class="acessibilidade"><div class="onoffswitch">
											<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" disabled/>
											<label class="onoffswitch-label" for="myonoffswitch">
												<div class="onoffswitch-inner"></div>
												<div class="onoffswitch-switch"></div>
											</label>
										</div></td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>		

		<!-- JavaScripts -->
		<script type="text/javascript" src="../scripts/scripts.js"></script>

	</body>
</html>