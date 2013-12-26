var fade = 300;    //Tempo de Fading (1000 = 1 segundo)


// LOGIN SCREEN --------------------------------

$('#loginButton').click(function(){
	var nick = $('#usernameInput').val();
	var pass = $('#passwordInput').val();
	$('#error').empty();
	if(nick.length > 0 && pass.length > 0)
		$.post('php/login.php',
				{
					nick:nick,
					pass:pass
				},
				function(data){$('#error').text(data);}
		);
	else $('#error').text("Preencha ambos os campos para poder iniciar sessão");
	var pass = $('#passwordInput').val('');
	$('#error').fadeIn(fade).delay(fade*10).fadeOut(fade);
});