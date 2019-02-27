<!--
PHP que grava em variaveis locais o post do form efetuado na pagina pesquisa de forma a manipular 
o que é imprimido. Variavel total serve como counter para a quantidade de resultados encontrados
-->
<?php
	session_start();
	if(!file_exists('users/' . $_SESSION['username'] . '.xml')){
		header('Location: login.php');
		die;
	}
	$cidade=$_POST['cidade'];
	$marca=$_POST['marca'];
	$total=0;
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset='utf-8' />
		<meta name="keywords" content="alugar carros, alugar carros baratos, alugar carros low cost, como alugar um carro" />
		<meta name="Description" content="Site para gestão de aluguer de automóveis particulares" />
		<meta name="author" content="Tiago Martins" />
		<title>Bikedrive</title>
		<link type='image/gif' rel='icon' href='imgs/fav.gif' />
		<link rel="stylesheet" href="styles/resultado.css"/>
	</head>
	
		<body>
		
			<div id="top">
			<h1>Resultados:</h1>	
			<!--
			PHP para verificar a existencia de bicicletas na cidade referida. 
			Ciclo para cada elemento do xml, verificar a marca. Se for a marca que procuramos, 
			é imprimido e o counter incrementado, caso contrario, passa ao proximo. 
			No caso de não existir qualquer resultado, é imprimida uma mensagem a referir tal
			-->
			<?php	
				if(file_exists('bicicletas/' . $cidade . '.xml')){
					$bicicletas=simplexml_load_file('bicicletas/' . $cidade .'.xml');		
					foreach($bicicletas->bicicleta as $bicicleta)
					{
						if($bicicleta->marca == $marca)
						{
							$total+=1;
							echo '
						<div id="box">
						<ul>
							<li> Local: '. basename($cidade, '.xml') .'</li>
							<li> Marca: '. $bicicleta->marca .'</li>
							<li> Preco: '. $bicicleta->preco .'</li>
							<a href="reservar.php"><button id="reservar">Reservar</button></a>
						</ul>
						</div>';
						}
					}
					echo '<h3 id="green">Número de bicicletas encontradas: '.$total.'</h3>';
				}else
				{
					echo'<h3 id="red">Não existem bicicletas nesta zona!</h3>';
				}

					/*foreach($bicicletas->bicicleta as $bicicleta){
						echo '
						<div id="box">
						<ul>
							<li> Local: '. basename($cidade, '.xml') .'</li>
							<li> Marca: '. $bicicleta->marca .'</li>
							<li> Preco: '. $bicicleta->preco .'</li>
							<a href="reservar.php"><button id="reservar">Reservar</button></a>
						</ul>
						</div>';
					}*/
			?>
		</div>
			<hr>	
			<div id="btnPesquisa">
			<button type="button" onclick="location.href='pesquisa.php'">Nova Pesquisa</button>
		</div>
		<?php
			require_once "header.php";
			require_once "footer.php";
			require_once "fixed.php"
		?>
	</body>
</html>