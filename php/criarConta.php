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

		<title>Managing Your Home</title>
	</head>
	<body>

		<table width="100%" height="100%">
			<tr><td id="container">
				<img src="../media/img/logo.png" id="logo"/>		
				<div id="loginContainer" align="center">
					<form name="loginForm">
						<table id="login">
							<tr>
								<td class="loginLabel">Nome de utilizador:</td>
								<td><input type="text" name="username" id="usernameInputCC" class="loginFields"/></td>
							</tr>
							<tr>
								<td class="loginLabel">Nome próprio:</td>
								<td><input type="text" name="name" id="nameInputCC" class="loginFields"/></td>
							</tr>
							<tr>
								<td class="loginLabel">Palavra-passe:</td>
								<td><input type="password" name="password" id="passwordInputCC" class="loginFields"/></td>
							</tr>
							<tr>
								<td class="loginLabel">Verificar palavra-passe:</td>
								<td><input type="password" name="passwordVerification" id="passwordVerificationInputCC" class="loginFields"/></td>
							</tr>
							<tr><td colspan="2" class="loginButtons">
								<input type="button" name="criarConta" value="Criar Conta"  id="createButtonCC" class="loginButtons"/> 
								<input type="reset" name="cancelar" value="Cancelar" id="cancelButtonCC" class="loginButtons"/>
							</td></tr>
						</table>
					</form>
					<div id="error">&nbsp;</div>
				</div>
			</td></tr>
		</table>

		<!-- JavaScripts -->
		<script type="text/javascript" src="../scripts/scripts.js"></script>

	</body>
</html>