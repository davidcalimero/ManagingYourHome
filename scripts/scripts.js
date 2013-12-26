var fade = 300;    //Tempo de Fading (1000 = 1 segundo)




// LOGIN SCREEN --------------------------------

$('#loginButton').click(function(){
	var nick = $('#usernameInput').val();
	var pass = $('#passwordInput').val();
	//$('#error').empty();
	if(nick.length > 0 && pass.length > 0)
		$.post('php/procedures/login.php',
				{
					nick:nick,
					pass:pass
				},
				function(data){
					if(data)
						$('#error').text(data);
					else{
						var substr = window.location.pathname.split('/');
						window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] + "/php/planta.php";
					}
				}
			);
	else $('#error').text("Preencha ambos os campos para poder iniciar sessão");
	$('#passwordInput').val('');
	$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
});


$('#createAccount').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] +  "/php/criarConta.php";
});




// CREATE ACCOUNT SCREEN --------------------------------

$('#createButtonCC').click(function(){
	var nick = $('#usernameInputCC').val();
	var name = $('#nameInputCC').val();
	var pass = $('#passwordInputCC').val();
	var passV = $('#passwordVerificationInputCC').val();
	//$('#error').empty();
	if(nick.length > 0 && name.length > 0 && pass.length > 0 && passV.length > 0){
		if(pass == passV){
			$.post('procedures/createAccount.php',
					{
						nick:nick,
						name:name,
						pass:pass
					},
					function(data){
						if(data)
							$('#error').text(data);
						else{
							var substr = window.location.pathname.split('/');
							window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2];
							$('#error').text("Conta criada com sucesso");
						}
					}					
				);
		}
		else $('#error').text("As palavras-passe têm de ser iguais");
	}
	else $('#error').text("Preencha todos os campos para poder criar uma conta");
	$('#passwordInputCC').val('');
	$('#passwordVerificationInputCC').val('');
	$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
});


$('#cancelButtonCC').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2];
});