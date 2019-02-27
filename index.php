<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset='utf-8' />
		<meta name="keywords" content="bicicleta, alugar bicicletas, alugar bicicletas baratas, alugar bicicletas low cost, como alugar uma bicicleta" />
		<meta name="Description" content="Site para pesquisa e gestão de aluguer de bicicletas" />
		<meta name="author" content="Tiago Martins & Vitor Silva" />
		<title>Bikedrive</title>
		<link type='image/gif' rel='icon' href='imgs/favicon.jpg' />
		<link rel="stylesheet" href="styles/index.css"/>
	</head>
	
	<body>
		<!--div para aplicar estilos-->
		<div id="top">
			<h1>Nunca foi tão fácil alugar uma Bicicleta</h1>
			<h2>Você é que escolhe quanto tempo precisa</h2>
			<button type="button" onclick="location.href='pesquisa.php'">Alugue</button><br>
			<button type="button" onclick="location.href='rentabilizar.php'">Rentabilize</button>
			<h3>Plataforma utilizada para aluguer de bicicletas entre particulares em Portugal</h3>
		</div>
		<!--linha apenas para visualizar uma divisão de secção de página-->
		<hr>
		<!--divs para colocar lado a lado com os seus respetivos botões por baixo-->
		<div id="middle">
			<div id="alug">
				<img src="imgs/chaves.jpg" alt="Pesquisa de Carros"></a><br>
				<button type="button" onclick="location.href='pesquisa.php'">Alugue uma bicicleta e chegue a toda o lado</button>
			</div>
		<div id="rent">
			<img src="imgs/chaves2.jpg" alt="Rentabilizar Carro"></a><br>
			<button type="button" onclick="location.href='rentabilizar.php'">Rentabilize a sua bicicleta parada</button>
		</div>
		</div>
		<!--carrega o header, footer e o fixed(onde se encontra link para facebook e instagram)-->
		<?php
		require_once "header.php";
		require_once "footer.php";
		require_once "fixed.php";
		?>
	</body>
</html>