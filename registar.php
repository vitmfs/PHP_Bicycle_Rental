<!--PHP para verificar que, ao ser submetido, guarda os atributos e verifica individualmente cada um deles para verificar se existe espaços em branco e se as passwords coincidem, no caso de haver um ou outro, é adicionado num array de erros. No caso de estar tudo certo e o utilizador ainda nao estar registado, cria um utilizador novo-->
<?php
$errors = array();
if(isset($_POST['registar'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];

	if(file_exists('users/' . $username . '.xml')){
		$errors[] = 'Username already exists';
	}
	if($username == ''){
		$errors[] = 'Username is blank';
	}
	if($email == ''){
		$errors[] = 'Email is blank';
	}
	if($password == '' || $c_password == ''){
		$errors[] = 'Passwords are blank';
	}
	if($password != $c_password){
		$errors[] = 'Passwords do not match';
	}
	if(count($errors) == 0){
		$xml = new SimpleXMLElement('<user></user>');
		$xml->addChild('password', $password);
		$xml->addChild('email', $email);
		$xml->asXML('users/' . $username . '.xml');
		session_destroy();
		header('Location: index.php');
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
	<link rel="stylesheet" href="styles/registar.css"/>
</head>
<body>
<h1>Register Page</h1>
	<form method="post" action="">
	<!--graças ao array de erros que foi criado no inicio desta pagina, é nos permitido imprimir os erros em questão-->
		<?php
		if(count($errors > 0)){
			echo '<ul>';
			foreach($errors as $e){
				echo '<li>' . $e . '</li>';
			}
			echo '</ul>';
		}
		?>
		<p>Username <input type="text" name="username" size="20" /></p>
		<p>Email <input type="text" name="email" size="20" /></p>
		<p>Password <input type="password" name="password" size="20" /></p>
		<p>Confirm Password <input type="password" name="c_password" size="20" /></p>
		<div id="button">
		<p><input type="submit" name="registar" value="Registar" /></p>
		</div>
	</form>
<?php
require_once "header.php";
require_once "footer.php";
require_once "fixed.php"
?>
</body>
</html>