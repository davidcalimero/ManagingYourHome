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

			/* Volume Slider */
			input[type="range"]#volume_slider {
			    -webkit-appearance: none;
			    background-color: #112211;
			    width: 200px;
			    height: 20px;			    
			    z-index: 0;
			}

			input[type="range"]#volume_slider::-webkit-slider-thumb {
			    -webkit-appearance: none;			    
			    background-color: #94c600;
			    opacity: 1.0;
			    width: 25px;
			    height: 50px;
			}

			/* Volume */
			#volume_st1 {
				background-color: #94c600;
				position: relative;
				height: 20px;
			}

			#televisao {				
				position: absolute; 
				z-index: 1; 
			}

			#televisao img {
				width: 100%; 
			} 

			#TVButtons {
				margin-bottom: 5%;
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
											<td width="50%">        
												<div style="position: relative; max-width: 50%">
													<?php 
															require 'procedures/connection.php';

															$query = "select v1, v2 from equipamento where eID = 'st1';";
															$result = pg_query($query) or die(pg_last_error());
															while ($value = pg_fetch_array($result)) {
																$volume = $value[0];
																$canal = $value[1];
															}
															pg_free_result($result);

														echo "<div id=\"volume_st1\" style=\"width: " . $volume . "px;\">&nbsp;</div>";                        			
														echo "<div id=\"televisao\" width=\"100%\" height=\"100%\">";							
																echo "<img src=\"../media/img/" . $canal . ".png\" id=\"channel\" alt=\"" . $canal . "\"><br>
																	<div id=\"value\">" . $volume . "%</div>"; 
																	?>
														</div>
												</div>
											</td>
											<td width="50%" style="background-color: #0055FF;">
												<div style="position: relative;">
													<div id="TVbuttons">
														<input type="button" name="off" value="off" id="offButton" class="loginButtons" 
															onclick="if(isOn('channel')) { 
																		updateChannel('channel', 0); 
																		updateChannelDB('st1', 'channel');
																		updateVolume('#volume_st1', 0);
																		updateVolumeDB('st1', '#volume_st1'); 
																		} 
																	else { 
																		updateChannel('channel', 1); 
																		updateChannelDB('st1', 'channel');
																		updateVolume('#volume_st1', 10);
																		updateVolumeDB('st1', '#volume_st1');
																	}"/>							
														<input type="button" name="mute" value="M" id="muteButton" class="loginButtons" 
															onclick="if(isOn('channel')) {
																		if(isMute('#volume_st1')) {
																			updateVolume('#volume_st1', 10);
																			updateVolumeDB('st1', '#volume_st1');
																		}
																		else {
																			updateVolume('#volume_st1', 0);
																			updateVolumeDB('st1', '#volume_st1');
																		}
																	}"/>

														<input type="button" name="one" value="1" id="oneButton" class="loginButtons" 
																onclick="if(isOn('channel')) {
																			updateChannel('channel', 1);
																			updateChannelDB('st1', 'channel');
																		}"/>
														<input type="button" name="two" value="2" id="twoButton" class="loginButtons" 
																onclick="if(isOn('channel')) {
																			updateChannel('channel', 2);
																			updateChannelDB('st1', 'channel');
																		}"/>
														<input type="button" name="three" value="3" id="threeButton" class="loginButtons" 
																onclick="if(isOn('channel')) {
																		updateChannel('channel', 3);
																		updateChannelDB('st1', 'channel');
																	}"/> 
														<input type="button" name="four" value="4" id="fourButton" class="loginButtons" 
															onclick="if(isOn('channel')) {
																		updateChannel('channel', 4);
																		updateChannelDB('st1', 'channel');
																	}"/>

														<input type="button" name="vplus" value="V+" id="vplusButton" class="loginButtons" 
															onclick="if(isOn('channel')) {
																		incVolume('#volume_st1');
																		updateVolumeDB('st1', '#volume_st1');
																	} "/>
														<input type="button" name="vminus" value="V-" id="vminusButton" class="loginButtons" 
															onclick="if(isOn('channel')) {
																		decVolume('#volume_st1');
																		updateVolumeDB('st1', '#volume_st1');
																	}"/>
														<input type="button" name="pplus" value="P+" id="pplusButton" class="loginButtons" 
															onclick="if(isOn('channel')) {
																		incChannel('channel');
																		updateChannelDB('st1', 'channel');
																	}"/>
														<input type="button" name="pminus" value="P-" id="pminusButton" class="loginButtons" 
																onclick="if(isOn('channel')) {
																			decChannel('channel');
																			updateChannelDB('st1', 'channel');
																		}"/>
													</div>	
													<!--
													<?php 
														/*	echo "<input id=\"volume_slider\" type=\"range\" name=\"blind\" 
															min=\"0\" max=\"100\" value=\"" . $volume . "\" 
															onchange=\"updateVolume('#volume_st1', this.value)\">"; */
													?>
													-->
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