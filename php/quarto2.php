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

		<title>Managing Your Home: Quarto</title>
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
														$query = "SELECT dNome FROM divisao WHERE dID = 'quarto2';";
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
                                    <div id="submainDivision"> 
                                        <div class="itemContainer">
                                            <img src="../media/img/quarto2.jpg"/>
                                            <div id="q2l1"><img style="width: 100%; height: 18%" src="../media/img/square.png"/></div>   
                                            <div id="q2l2"><img style="width: 100%; height: 21%" src="../media/img/square.png"/></div>   
                                            <div id="q2e1"><img style="width: 100%; height: 100%" src="../media/img/square.png"/></div>   
                                            <div id="q2e2"><img style="width: 100%; height: 77%" src="../media/img/square.png"/></div>   
                                            <div id="q2e3"><img style="width: 100%; height: 74%" src="../media/img/square.png"/></div>   
                                            <div id="q2e4"><img style="width: 100%; height: 100%" src="../media/img/square.png"/></div>          
                                        </div>
                                    </div>
                                    <img style="margin-top: 1%; margin-left: 12%; width: 5%; position: absolute;  z-index: 1000;" src="../media/img/360icon.png"/>
									<div class="hcentered">	
										<div id="submain"> 
										 	<div id="planta">
												<img src="../media/img/Planta.png" style="opacity: 0" /> 
											</div>
										</div>
									</div>
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