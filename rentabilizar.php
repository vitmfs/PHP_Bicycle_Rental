<!--PHP para verificar espacos em branco, caso haja, adiciona ao array de erros. Verifica se ja existe bicicleta na cidade referida, caso exista, adiciona ao xml a informacao de uma nova bicicleta, caso nao exista, cria um xml novo com o formato apropriado-->
<?php
session_start();
if(!file_exists('users/' . $_SESSION['username'] . '.xml')){
	header('Location: login.php');
	die;
}
$errors = array();
if(isset($_POST['criar'])){
		$cidade = $_POST['cidade'];
		$marca = $_POST['marca'];
		$preco = $_POST['preco'];

	if($cidade == ''){
		$errors[] = 'Cidade is blank';
	}
	if($marca == ''){
		$errors[] = 'Marca is blank';
	}
	if($preco == ''){
		$errors[] = 'Preco is blank';
	}

	if(!file_exists('bicicletas/' . $cidade . '.xml') && count($errors) == 0){
		$xml = new SimpleXMLElement('<cidade></cidade>');
		$xml->addChild('bicicleta');
		$xml->bicicleta->addChild('marca', $marca);
		$xml->bicicleta->addChild('preco', $preco);
		$xml->bicicleta->addChild('disponibilidade', 'sim');
		$xml->asXML('bicicletas/' . $cidade . '.xml');
		header('Location: pesquisa.php');
		die;
	}elseif(count($errors) == 0)
	{
		$xml = simplexml_load_file('bicicletas/' . $cidade . '.xml'); 
		$bicicleta=$xml->addChild('bicicleta');
		$bicicleta->addChild('marca', $marca);
		$bicicleta->addChild('preco', $preco);
		$bicicleta->addChild('disponibilidade', 'sim');
		$xml->asXML('bicicletas/' . $cidade . '.xml');
		header('Location: pesquisa.php');
		die;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8' />
	<meta name="keywords" content="alugar carros, alugar carros baratos, alugar carros low cost, como alugar um carro" />
	<meta name="Description" content="Site para gestão de aluguer de automóveis particulares" />
	<meta name="author" content="Tiago Martins" />
	<title>Booking Drive</title>
	<link type='image/gif' rel='icon' href='imgs/fav.gif' />
	<link rel="stylesheet" href="styles/rentabilizar.css"/>
</head>
<body>
<div id="registo">
<div id="form">
<h1>Register Bicicleta</h1>
	<form method="post" action="">
	<!--mais uma vez, impressao dos erros na introdução de dados da bicicleta-->
		<?php
		if(count($errors > 0)){
			echo '<ul>';
			foreach($errors as $e){
				echo '<li>' . $e . '</li>';
			}
			echo '</ul>';
		}
		?>
		<p>Cidade <input type="text" name="cidade" size="20" /></p>
		<p>Marca <input type="text" name="marca" size="20" /></p>
		<p>Preco <input type="text" name="preco" size="20" /></p>
		<div id="button">
		<p><input id="criar" type="submit" name="criar" value="Criar" /></p>
		</div>
	</form>
</div>
</div>
<?php
require_once "header.php";
require_once "footer.php";
require_once "fixed.php"
?>
</body>
</html>