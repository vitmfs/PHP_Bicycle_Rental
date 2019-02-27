<?php
	session_start();
	if(!file_exists('users/' . $_SESSION['username'] . '.xml')){
		header('Location: login.php');
		die;
	}
	//informação postada no form é gravada
	$error=false;
	if(isset($_POST['changepassword'])){
		$old=$_POST['o_password'];
		$new=$_POST['n_password'];
		$c_new=$_POST['c_n_password'];
	//verifica se password é igual a introduzida, se sim altera e faz logout
		$xml = new SimpleXMLElement('users/' . $_SESSION['username'] . '.xml', 0, true);
		if($old == $xml->password){
			if($new == $c_new){
				$xml->password=$new;
				$xml->asXML('users/' . $_SESSION['username'] . '.xml');
				header('Location: logout.php');
				die;
			}
		}
		$error=true;
	}
	if(isset($_POST['changeemail'])){
		$old=$_POST['o_email'];
		$new=$_POST['n_email'];
		$c_new=$_POST['c_n_email'];
	//verifica o email se é igual ao introduzido, se sim altera e faz logout
		$xml = new SimpleXMLElement('users/' . $_SESSION['username'] . '.xml', 0, true);
		if($old == $xml->email){
			if($new == $c_new){
				$xml->email=$new;
				$xml->asXML('users/' . $_SESSION['username'] . '.xml');
				header('Location: index.php');
				die;
			}
		}
		$error=true;
	}
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
		<link rel="stylesheet" href="styles/user.css"/>
	</head>
	<body>
		<div id="forms">
			<div id="changePassword">
				<h1>Change Password</h1>
				<form method="post" action="">
				<!--se existir algum erro ao introduzir as password, uma mensagem é imprimida-->
					<?php
						if($error){
							echo '<p>Some of the passwords do not match</p>';
						}
					?>
					<p>Old password <input type="password" name="o_password" /></p>
					<p>New password <input type="password" name="n_password" /></p>
					<p>Confirm new password <input type="password" name="c_n_password"></p>
					<p><input type="submit" name="changepassword" value="Change"/></p>
				</form>
			</div>
			<div id="changeEmail">
				<h1>Change email</h1>
				<form method="post" action="">
				<!--se existir algum erro ao introduzir os emails, uma mensagem é imprimida-->
					<?php
					if($error){
						echo '<p>Some of the emails do not match</p>';
					}
					?>
					<p>Old email <input type="text" name="o_email" /></p>
					<p>New email <input type="text" name="n_email" /></p>
					<p>Confirm new email <input type="text" name="c_n_email"></p>
					<p><input type="submit" name="changeemail" value="Change"/></p>
				</form>
			</div>	
		</div>
		<hr/>
		<div id="buttons">
			<button id="botaoE" type="button" onclick="location.href='pesquisa.php'">Pesquisar</button>
			<button id="botaoD" type="button" onclick="location.href='rentabilizar.php'">Rentabilizar</button>
		</div>
		<?php
			require_once "header.php";
			require_once "footer.php";
			require_once "fixed.php";
		?>
	</body>
</html>