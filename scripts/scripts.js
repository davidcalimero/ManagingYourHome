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




// SIDEBAR --------------------------------

$('#help').click(function(){
	$('#definicoes').hide();
	$('#editar').hide();
	$('#ajuda').fadeToggle(fade);
});

$('#settings').click(function(){
	$('#ajuda').hide();
	$('#definicoes').fadeToggle(fade);
});

$('#edit').click(function(){
	$("#cancelAD").click();
	$('#ajuda').hide();
	$('#editar').fadeToggle(fade);
});

$('#logout').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] + "/index.html";
});

$('#sbarlogo').click(function(){
	var substr = window.location.pathname.split('/');
	window.location = "http://web.ist.utl.pt/" + substr[1] + "/" + substr[2] + "/php/planta.php";
});




// EDITAR DIVISAO --------------------------------

function saveEdit(divisao){
	var name = $('#nomeDivisao').val();
	var image = $('#imagemDivisao').find('img:first').attr("alt"); 
	$('#error').val('&nbsp;');
	if(name.length > 0){
		var permissoes = [];
		$("#comPermissao tr").each(function(i, v){
				permissoes.push($(this).find('td').text());
		});
		$.post('procedures/editRoom.php',
				{
					name:name,
					image:image,
					divisao:divisao,
					permissoes:permissoes
				},
				function(data){
					$("#edit").click();
					$("#nomeDivisao").attr("value", name);
					$('#error').css('background-color', '#EEFFEE');
					$('#location').text(name);
					$('#error').css('color', '#119911');
					$('#error').text("As alterações feitas à divisão foram guardadas com sucesso!");
				}
			);
	}
	else $('#error').text("Erro: O nome de uma divisão deve ter entre 1 e 20 caracteres");
	$('#error').fadeTo(fade, 100).delay(fade*10).fadeTo(fade, 0);
}

function cancelEdit(divisao){
	$('#imagemEscolher').fadeOut(fade);
	$.post('procedures/roomImage.php',
			{
				divisao:divisao
			},
			function(data){
				$('#imagemDivisao').html("<img style=\"height: 30%\" src=\"../media/img/" + data + "\" alt=\"" + data + "\"/>");
			}
		);
	$.post('procedures/roomPermission.php',
			{
				divisao:divisao
			},
			function(data){
				$('#permissoesDivisao').html(data);
			}
		);
}

$('#imagemDivisao').click(function(){
	$('#imagemEscolher').fadeToggle(fade);
});

$('.imagemAlt').click(function() {
	$('#imagemEscolher').fadeOut(fade);
	$('#imagemDivisao').empty().append($(this).clone());
 });

$(document).on('click', '.pessoaCom', function() {
	var clone = $(this).clone();
	clone.attr('class', 'pessoaSem');
	clone.insertAfter('#semPermissao tbody>tr:last');
	$(this).remove();
 });

$(document).on('click', '.pessoaSem', function() {
	var clone = $(this).clone();
	clone.attr('class', 'pessoaCom');
	clone.insertAfter('#comPermissao tbody>tr:last');
	$(this).remove();
 });

$('#cancelSI').click(function() {
	$('#imagemEscolher').fadeOut(fade);
 });


// LUZES --------------------------------

function updateLight(lightsource, alfavalue) {
	var newlight = "rgba(100%, 100%, 0%," + alfavalue / 100.0 + ")";
	document.getElementById("value").innerHTML = alfavalue + "%";
	$(lightsource).css('background', newlight);	
}		

/* BD */
function updateLightBD(dbID) {
	var lastValue = document.getElementById("light_slider").value;
//	document.getElementById("error").innerHTML = lastValue; // DEBUG
	$.post('procedures/modifyV1.php',
	{
		eID: dbID,
		v1: lastValue
	});
}

// ESTORES --------------------------------

function updateBlind(blindcurtain, newheight) {
	document.getElementById("value").innerHTML = newheight + "%";
	$(blindcurtain).css('height', newheight);	
}

/* BD */
function updateBlindDB(dbID) {
	var lastValue = document.getElementById("blind_slider").value;
//	document.getElementById("error").innerHTML = lastValue; // DEBUG
	$.post('procedures/modifyV1.php',
	{
		eID: dbID,
		v1: lastValue
	});
}

// TELEVISAO --------------------------------

// Estado
function isOn(tv) {
	 if(document.getElementById(tv).getAttribute("alt") == "0") {
		return false;
	}
	else {
		return true;
	} 
}

function isMute(volumebar) {
	var currentwidthstr = $(volumebar).css('width').split("px");
	var currentwidth = parseFloat(currentwidthstr[0]);
	if(currentwidth != 0) {
		return false;
	}
	else {
		return true;
	} 
}

// Volume
function updateVolume(volumebar, newwidth) {
//	document.getElementById("error").innerHTML = newwidth; //DEBUG
	document.getElementById("value").innerHTML = newwidth + "%";
	$(volumebar).css('width', newwidth + "px");	
}	

function incVolume(volumebar) {
	var currentwidthstr = $(volumebar).css('width').split("px");
	var currentwidth = parseFloat(currentwidthstr[0]);
	// document.getElementById("error").innerHTML = currentwidth; // DEBUG
	if(currentwidth < 100) {
		currentwidth++;
	//	document.getElementById("error").innerHTML = currentwidth; // DEBUG
		document.getElementById("value").innerHTML = currentwidth + "%";
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
		document.getElementById("value").innerHTML = currentwidth + "%";
		$(volumebar).css('width', currentwidth + "px");
	}
}

/* BD */
function updateVolumeDB(dbID, volumebar) {
	var currentwidthstr = $(volumebar).css('width').split("px");
	var currentwidth = parseFloat(currentwidthstr[0]);
	$.post('procedures/modifyV1.php',
	{
		eID: dbID,
		v1: currentwidth
	});
}

// Canal
function updateChannel(tv, newchannel) {
	document.getElementById(tv).setAttribute("alt", newchannel);				
	var newsrc = "../media/img/" + newchannel + ".png";
	//document.getElementById("error").innerHTML = newsrc; // DEBUG
	document.getElementById(tv).setAttribute("src", newsrc);
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

/* BD */
function updateChannelDB(dbID, tv) {
	var currentchannel = parseInt(document.getElementById(tv).getAttribute("alt"));
	$.post('procedures/modifyV2.php',
	{
		eID: dbID,
		v2: currentchannel
	}); 
}