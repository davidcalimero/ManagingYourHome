<html>
	<head>

		<!-- Propriedades do documento -->
		<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../stylesheet.css">

		<!-- JQuery -->
		<script type="text/javascript" src="../scripts/jquery.js"></script>

		<title>Managing Your Home: Luz 1</title>
	</head>
	<body>
		<script type="text/javascript">
			function updateSlider(slideAmount) {
				//document.getElementById("result").innerHTML = slideAmount;
				var cor = document.getElementById("luz").style.background;
				var novacor = "rgba(100%, 100%, 0%," + slideAmount / 100.0 + ")";
				document.getElementById("result").innerHTML = novacor;
				$('#luz').css('background', novacor);
			//	document.getElementById("luz").style.background.color;				
			}
		</script>

		<div style="position: relative; max-width: 100%;">			
					<div style="position: absolute; z-index: 1;" id="lampada">
						<img style="left: 0%; top: 0%;" width="50%" height="100%" src="../media/img/lampada.png"/> 
					</div>
					<div id="luz" style="position: relative; width: 50%; height: 100%; background-color: #FFFF00"> <!-- id vindo da bd --> &nbsp;</div>
		</div>
		<br>
		<div style="background-color: #0055FF; position: relative; margin-left: 50%; margin-top: 0%;">
			<input type="range" name="light" id="light_slider" min="0" max="100" onchange="updateSlider(this.value)">
			Result: <div id="result">&nbsp;</div>
		</div>
	<!-- JavaScripts -->
		<script type="text/javascript" src="../scripts/scripts.js"></script>		

	</body>
</html>