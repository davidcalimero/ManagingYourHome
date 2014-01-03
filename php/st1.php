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

			#tv_feedback {
				position: relative; 
				width: 90%; 
				max-height: 60%;
				margin-left: auto; 
				margin-right: auto;
			}

			#televisao {				
				position: absolute; 				 
			}

			#televisao img {
				width: 100%; 
			} 


			#volume_st1 {
				background-color: #94c600;
				height: 30px;				
			}

			#volume_st1border {
				margin-top: 45%;
				margin-left: 10%;
				position: absolute;
				z-index: 1;
				width: 200px;
				height: 30px;
				border: solid 2px #112211;
			}

			#mutepic {
				margin-top: 45%;
				margin-left: 10%;
				position: absolute;
				z-index: 1;
				height: 30px;				
			}

			#comando {
				margin-left: 10%;
			}		
			
			#comando img {
				width: 50%;
				max-width: 100%;
				position: relative;
			}

			#TVButtons {
				margin-bottom: 5%;
			}

			.TVbutton {
				color: #FFFFFF;
				position: absolute;
				z-index: 1;
			}

			#offButton {
			/*	background-color: #110066; */
				margin-top: 3%;
				margin-left: 15%;
				width: 7%;
				height: 17%;
			}

			#muteButton {
				/*background-color: #220066; */
				margin-top: 8%;
				margin-left: 44%;
				width: 6%;
				height: 7%;
			}

			#oneButton {
				/*background-color: #330066; */
				margin-top: 16%;
				margin-left: 15%;
				width: 8%;
				height: 12%;
			}

			#twoButton {
				/*background-color: #440066;*/
				margin-top: 16%;
				margin-left: 24%;
				width: 8%;
				height: 12%;
			}

			#threeButton {
				/*background-color: #550066;*/
				margin-top: 16%;
				margin-left: 33%;
				width: 8%;
				height: 12%;
			}

			#fourButton {
				/*background-color: #660066;*/
				margin-top: 25%;
				margin-left: 15%;
				width: 8%;
				height: 12%;
			}

			#vplusButton {
				/*background-color: #770066;*/
				margin-top: 17%;
				margin-left: 44%;
				width: 7%;
				height: 10%;
			}

			#vminusButton {
				/*background-color: #880066;*/
				margin-top: 25%;
				margin-left: 44%;
				width: 7%;
				height: 10%;
			}

			#pplusButton {
				/*background-color: #990066;*/
				margin-top: 35%;
				margin-left: 44%;
				width: 7%;
				height: 10%;
			}

			#pminusButton {
				/*background-color: #AA0066;*/
				margin-top: 43%;
				margin-left: 44%;
				width: 7%;
				height: 10%;
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
														$query = "select dNome from divisao NATURAL JOIN equipada where eID = 'st1';";
														$result = pg_query($query) or die(pg_last_error());
														foreach (pg_fetch_assoc($result) as $value)
															$nome = $value;
														echo $value;
														pg_free_result($result);
														pg_close();
													?> ► </span>
												<span id="location"><?php 
														require 'procedures/connection.php';
														$query = "select eNome from equipamento where eID = 'st1';";
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
												<div style="position: relative; margin-top: -30%;">
													<div id="tv_feedback">
														<?php 
															require 'procedures/connection.php';

															$query = "select v1, v2 from equipamento where eID = 'st1';";
															$result = pg_query($query) or die(pg_last_error());
															while ($value = pg_fetch_array($result)) {
																$volume = $value[0];
																$canal = $value[1];
															}
															pg_free_result($result);

															if($canal == 0) {
																$opacitymute = 0;
																$opacityvol = 0;
															}
															else if($volume == 0) {
																$opacitymute = 1;
																$opacityvol = 0;
															} 
															else {
																$opacitymute = 0;
																$opacityvol = 1;
															}

															echo "<img id=\"mutepic\" src=\"../media/img/v0.png\" style=\"opacity: " . $opacitymute . "\">";
															echo "<div id=\"volume_st1border\" style=\"opacity: " . $opacityvol . "\">
																		<div id=\"volume_st1\" style=\"width: " . $volume . "px;\">&nbsp;
																		</div>
																	</div>";   
															echo "<div id=\"televisao\" width=\"100%\" height=\"100%\">
																		<img src=\"../media/img/" . $canal . ".png\" id=\"channel\" alt=\"" . $canal . "\">
																	</div>"; 
														?>																
													</div>
												</div>
											</td>
											<td width="50%" style="background-color: #0055FF;">
												<div style="position: relative;">													
													<div id="TVbuttons">
														<div id="offButton" class="TVbutton" onclick="turnOff('#volume_st1', 'channel', 'st1')">&nbsp;</div>

														<div id="muteButton" class="TVbutton" 
																	onclick="if(isOn('channel')) {
																				if(isMute('#volume_st1')) {
																					updateVolume('#volume_st1', 50);
																					updateVolumeDB('st1', '#volume_st1');
																				}
																				else {
																					updateVolume('#volume_st1', 0);
																					updateVolumeDB('st1', '#volume_st1');
																				}
																			}">&nbsp;</div>

														<div id="oneButton" class="TVbutton" 
																					onclick="if(isOn('channel')) {
																						updateChannel('channel', 1);
																						updateChannelDB('st1', 'channel');
																					}">&nbsp;</div>
														<div id="twoButton" class="TVbutton" 
																					onclick="if(isOn('channel')) {
																							updateChannel('channel', 2);
																							updateChannelDB('st1', 'channel');
																						}">&nbsp;</div>
														<div id="threeButton" class="TVbutton" 
																					onclick="if(isOn('channel')) {
																							updateChannel('channel', 3);
																							updateChannelDB('st1', 'channel');
																						}">&nbsp;</div> 
														<div id="fourButton" class="TVbutton" 
																				onclick="if(isOn('channel')) {
																							updateChannel('channel', 4);
																							updateChannelDB('st1', 'channel');
																						}">&nbsp;</div>

														<div id="vplusButton" class="TVbutton" 
																				onclick="if(isOn('channel')) {
																							incVolume('#volume_st1');
																							updateVolumeDB('st1', '#volume_st1');
																						} ">&nbsp;</div>
														<div id="vminusButton" class="TVbutton" 
																				 onclick="if(isOn('channel')) {
																							decVolume('#volume_st1');
																							updateVolumeDB('st1', '#volume_st1');
																						}">&nbsp;</div>
														<div id="pplusButton" class="TVbutton" 
																				onclick="if(isOn('channel')) {
																							incChannel('channel');
																							updateChannelDB('st1', 'channel');
																						}">&nbsp;</div>
														<div id="pminusButton" class="TVbutton" 
																			onclick="if(isOn('channel')) {
																							decChannel('channel');
																							updateChannelDB('st1', 'channel');
																						}">&nbsp;</div>
													</div>
													<div id="comando"><img src="../media/img/remote.png"></div>	
													
												</div> 
											</td>
										</tr>
									</table>

								</td></tr>
								<tr id="rodape"><td style="background-color: #AACC00;">
									<div id="error">&nbsp;</div>
								</td></tr>			

							</table>

							<div class="toggle" id="ajuda"><h1 class="settingsTitle">Ajuda</h1></div>

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
													$query = "SELECT eNome FROM equipamento WHERE eID = 'st1';";
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
											<input type="button" name="alterarDivisao" value="Guardar" id="saveAD" class="loginButtons" onclick="saveEdit('st1','utiliza','eID');"/> 
											<input type="reset" name="cancelar" value="Repor" id="cancelAD" class="loginButtons" onclick="cancelEdit('st1','utiliza','eID');"/>
										</td></tr>
									</table>
								</form>
								<div id="imagemEscolher">
									<div>Escolher Imagem:</div>
									<div id="imagens">
										<img class="imagemAlt" alt="cama1.png" src="../media/img/cama1.png"/>
										<img class="imagemAlt" alt="cama2.png" src="../media/img/cama2.png"/>
										<img class="imagemAlt" alt="cama3.png" src="../media/img/cama3.png"/>
										<img class="imagemAlt" alt="sofa.png" src="../media/img/sofa.png"/>
										<img class="imagemAlt" alt="talheres.png" src="../media/img/talheres.png"/>
										<img class="imagemAlt" alt="wc.png" src="../media/img/wc.png"/>
									</div>
									<input type="reset" name="cancelar" value="Cancelar" id="cancelSI" class="loginButtons"/>
								</div>
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