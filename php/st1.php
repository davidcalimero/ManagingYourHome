<html>
	<head>

		<!-- Propriedades do documento -->
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">

		<!-- JQuery -->
		<script type="text/javascript" src="../scripts/jquery.js"></script>

		<script type="text/javascript">
			/* Actualiza o volume na BD */
			function updateVolumeDB(dbID) {
			//	var lastValue = document.getElementById("volume_slider").value;
			//	document.getElementById("error").innerHTML = lastValue; // DEBUG
			/*	$.post('procedures/modifyV1.php',
				{
					eID: dbID,
					v1: lastValue
				}); */
			}

			function updateChannelDB(dbID, channel) {
			//	document.getElementById("error").innerHTML = channel; // DEBUG
			/*	$.post('procedures/modifyV2.php',
				{
					eID: dbID,
					v2: channel
				}); */
			}
		</script>

		<title>Managing Your Home: Televisão</title>
	</head>


	<body>

		<!-- *************************************************************** -->
		<script type="text/javascript">
		/* MOVER PARA O SCRIPTS */

			/* Actualiza volume */
			function updateVolume(volumebar, newwidth) {
				document.getElementById("value").innerHTML = newwidth + "%";
				$(volumebar).css('width', newwidth);	
			}

			function updateChannel(tv, newchannel) {
				document.getElementById(tv).setAttribute("alt", newchannel);				
				var newsrc = "../media/img/" + newchannel + ".png";
				//document.getElementById("error").innerHTML = newsrc; // DEBUG
				document.getElementById(tv).setAttribute("src", newsrc);
			}

			function isOn(tv) {
				 if(document.getElementById(tv).getAttribute("alt") == "0") {
					return false;
				}
				else {
					return true;
				} 
			}

			function incVolume(volumebar) {
				var currentwidthstr = $(volumebar).css('width').split("px");
				var currentwidth = parseFloat(currentwidthstr[0]);
				// document.getElementById("error").innerHTML = currentwidth; // DEBUG
				if(currentwidth < 100) {
					currentwidth++;
				//	document.getElementById("error").innerHTML = currentwidth; // DEBUG
					$(volumebar).css('width', currentwidth + "px");
				}
			}

			function decVolume(volumebar) {
				var currentwidthstr = $(volumebar).css('width').split("px");
				var currentwidth = parseFloat(currentwidthstr[0]);
				// document.getElementById("error").innerHTML = currentwidth; // DEBUG
				if(currentwidth > 0) {
					currentwidth--;
				//	document.getElementById("error").innerHTML = currentwidth; // DEBUG
					$(volumebar).css('width', currentwidth + "px");
				}
			}

			function incChannel(tv) {
				var currentchannel = parseInt(document.getElementById(tv).getAttribute("alt"));
				if (currentchannel < 4) {
					currentchannel++;
					document.getElementById(tv).setAttribute("alt", currentchannel);
					var newsrc = "../media/img/" + currentchannel + ".png";
					document.getElementById(tv).setAttribute("src", newsrc);
				}
			}

			function decChannel(tv) {
				var currentchannel = parseInt(document.getElementById(tv).getAttribute("alt"));
				if (currentchannel > 1) {
					currentchannel--;
					document.getElementById(tv).setAttribute("alt", currentchannel);
					var newsrc = "../media/img/" + currentchannel + ".png";
					document.getElementById(tv).setAttribute("src", newsrc);
				}
			}

		</script>

		<!-- *************************************************************** -->

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
													<div id="volume_st1">&nbsp;</div>                        			
													<div id="televisao" width="100%" height="100%">
													<?php 
															require 'procedures/connection.php';

															$query = "select v1, v2 from equipamento where eID = 'st1';";
															$result = pg_query($query) or die(pg_last_error());
															foreach (pg_fetch_assoc($result) as $value) {
																$volume = $value['v1'];
																$canal = $value['v2'];
															}
															pg_free_result($result);

															echo "Vol: " . $volume . "Canal: " . $canal . " <img src=\"../media/img/" . $canal . ".png\" id=\"channel\" alt=\"" . $canal . "\" onload=\"updateVolume('#volume_st1', " . $volume . ")\"><br>";
														?>
														<div id="value">&nbsp;</div>
													</div>
												</div>
											</td>
											<td width="50%" style="background-color: #0055FF;">
												<div style="position: relative;">
													<div id="TVbuttons">
														<div id="offButton" class="loginButtons" 
															onclick="if(isOn('channel')) { 
																			updateChannel('channel', 0); 
																			updateVolume('#volume_st1', 0); 
																	} else {
																		updateChannel('channel', 1); 
																		updateVolume('#volume_st1', 25);
																	}">Off</div>
														<input type="button" name="mute" value="M" id="muteButton" class="loginButtons" onclick="updateVolume('#volume_st1', 0);"/>
														<input type="button" name="one" value="1" id="oneButton" class="loginButtons" onclick="if(isOn('channel')) updateChannel('channel', 1);"/>
														<input type="button" name="two" value="2" id="twoButton" class="loginButtons" onclick="if(isOn('channel')) updateChannel('channel', 2);"/>
														<input type="button" name="three" value="3" id="threeButton" class="loginButtons" onclick="if(isOn('channel')) updateChannel('channel', 3);"/> 
														<input type="button" name="four" value="4" id="fourButton" class="loginButtons" onclick="if(isOn('channel')) updateChannel('channel', 4);"/>
														<input type="button" name="vplus" value="V+" id="vplusButton" class="loginButtons" onclick="if(isOn('channel')) incVolume('#volume_st1');"/>
														<input type="button" name="vminus" value="V-" id="vminusButton" class="loginButtons" onclick="if(isOn('channel')) decVolume('#volume_st1');"/>
														<input type="button" name="pplus" value="P+" id="pplusButton" class="loginButtons" onclick="if(isOn('channel')) incChannel('channel');"/>
														<input type="button" name="pminus" value="P-" id="pminusButton" class="loginButtons" onclick="if(isOn('channel')) decChannel('channel');"/>

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