var fade = 300;    //Tempo de Fading (1000 = 1 segundo)




// LOGIN SCREEN --------------------------------

$('#loginButton').click(function(){
	var nick = $('#usernameInput').val();
	var pass = $('#passwordInput').val();
	$('#error').val('&nbsp;');
	if(nick.length > 0 && pass.length > 0)
		$.post('php/procedures/login.php',
				{
					nick:nick,
					pass:pass
				},
				function(data){
					if(data){
						$('#error').text("Erro: " + data);
						$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
					}
					else{
						var substr = window.location.pathname.split('/');
						window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] + "/php/planta.php";
					}
				}
			);
	else {
		$('#error').text("Erro: Preencha ambos os campos para poder iniciar sessão");
		$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
	} 
	$('#passwordInput').val('');
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
	$('#error').val('&nbsp;');
	if(nick.length > 0 && name.length > 0 && pass.length > 0 && passV.length > 0){ 
		if(nick.length <= 20 && name.length <= 20 && pass.length <= 20){
			if(pass == passV){
				$.post('procedures/createAccount.php',
						{
							nick:nick,
							name:name,
							pass:pass
						},
						function(data){
							if(data)
								$('#error').text("Erro: " + data);
							else{
								var substr = window.location.pathname.split('/');
								setTimeout(function(){window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2]}, 500);
								$('#error').css('background-color', '#EEFFEE');
								$('#error').css('color', '#119911');
								$('#error').text("Conta criada com sucesso!");
							}
						}					
					);
			}
			else $('#error').text("Erro: As palavras-passe devem ser iguais");
		}
		else $('#error').text("Erro: Todos os campos devem ter no máximo 20 caracteres");
	}
	else $('#error').text("Erro: Preencha todos os campos para poder criar uma conta");
	$('#passwordInputCC').val('');
	$('#passwordVerificationInputCC').val('');
	$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
});


$('#cancelButtonCC').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2];
});




// PLANTA --------------------------------

function verificaPermissao(divisao){
	$.post('procedures/permissionDivision.php',
			{
				divisao:divisao,
			},
			function(data){
				if(data){
					$('#error').text("Erro: " + data);
					$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
				}
				else{
					var substr = window.location.pathname.split('/');
					window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2]  + "/" + substr[3] + "/" + divisao + ".php";
				}
			}					
		);	
}




// PLANTA --------------------------------

$('#help').click(function(){
	$('#definicoes').hide();
	$('#editar').hide();
	$('#ajuda').toggle();
});

$('#settings').click(function(){
	$('#ajuda').hide();
	$('#definicoes').toggle();
});

$('#edit').click(function(){
	$('#ajuda').hide();
	$('#editar').toggle();
});

$('#logout').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] + "/index.html";
});

$('#sbarlogo').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] + "/php/planta.php";
});