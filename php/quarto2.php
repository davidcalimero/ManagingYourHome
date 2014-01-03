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
                                    <img id="iconRot" src="../media/img/360icon.png"/>
									<div class="hcentered">	
										<div id="submain"> 
										 	<div id="planta">
												<img src="../media/img/Planta.png" style="opacity: 0" /> 
											</div>
										</div>
									</div>
								</td></tr>
								<tr id="rodape"><td>
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
													$query = "SELECT dNome FROM divisao WHERE dID = 'quarto2';";
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
											<td width="35%" class="loginLabel">Imagem:</td>
											<td><div id="imagemDivisao"></div></td>
										</tr>
										<tr>
											<td width="35%" class="loginLabel">Permissões:</td>
											<td><div id="permissoesDivisao"></div></td>
										</tr>
										<tr><td colspan="2" class="loginButtons">
											<input type="button" name="alterarDivisao" value="Guardar" id="saveAD" class="loginButtons" onclick="saveEdit('quarto2','acede','dID');"/> 
											<input type="reset" name="cancelar" value="Repor" id="cancelAD" class="loginButtons" onclick="cancelEdit('quarto2','acede','dID');"/>
										</td></tr>
									</table>
								</form>
								<div id="imagemEscolher">
									<div><h1 class="settingsTitle">Escolher Imagem:</div>
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