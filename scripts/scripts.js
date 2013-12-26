var fade = 300;    //Tempo de Fading (1000 = 1 segundo)


// LOGIN SCREEN --------------------------------

$('#loginButton').click(function(){
	var nick = $('#usernameInput').val();
	var pass = $('#passwordInput').val();
	$('#error').empty();
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
	var pass = $('#passwordInput').val('');
	$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
});