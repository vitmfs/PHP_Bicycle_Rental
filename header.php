<!--
PHP para verificar existência de um utilizador
variável error que é true se existir e false se não estiver correto. 
Verificação da submissão do form, armazenamento das variaveis POST, 
carregamento do xml caso exista o utilizador, verificação da password, 
se tudo estiver correto é iniciada sessão e utilizador é redirecionado para a página pesquisa
-->
<?php
	$error = false; 
	if(isset($_POST['login'])){ 
	  $username = $_POST['username']; 
	  $password=$_POST['password'];
	  if(file_exists('users/' . $username . '.xml')){ 
		$xml = new SimpleXMLElement('users/' . $username . '.xml', 0, true); 
		if($password == $xml->password){ 
		  session_start(); 
		  $_SESSION['username'] = $username;
		  header('Location: pesquisa.php'); 
		  die;
		}
	  }
	  $error = true; 
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset = 'utf-8'/>
		<link rel="stylesheet" href="styles/header.css" />
		<script src='scripts/jquery-1.12.1.min.js'></script>
		<script src='scripts/jquery.js'></script>
		<script src='scripts/forms.js'></script>
		<script src='scripts/scripts.js'></script>
	</head>
	<header>
		Bike<span>drive</span>
		<!--
		PHP que serve para verificar se existe uma sessão iniciada ou não, se sim, aparecem 2 botões (logout e user page), 
		se não, botão para efetuar o login
		-->
		<?php
		  if(isset($_SESSION)):?>
			<button id="botaoLogout" type="button" onclick="location.href='logout.php'">Logout</button>
			<button id="botaoLogin" type="button" onclick="location.href='user.php'"><?php echo $_SESSION['username']; ?></button>
		  <?php    
		  else:?>
			<button id="botaoLogin" type="button" onclick="document.getElementById('loginform').style.display='block'">Login</button>
		  <?php endif; 
		?>
		<!--Formulário que, ao ser submetido, ira enviar informação através de POST-->
		<div id="loginform" class="modal">
		  <span onclick="document.getElementById('loginform').style.display='none'" class="close" title="Close Modal">&times;</span>
		  <form method="post" class="modal-content animate" action="">
		  <div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		  </div>
		  <div class="container">
			<p>Username <input type="text" name="username" size="20"/></p>
			<p>Password <input type="password" name="password" size="20"/></p>
			<!--no caso da variável error ser true, é comunicado um erro no login-->
			<?php
			if($error)
			{
			  echo '<p>Invalid username and/or password</p>';
			}
			?>
			<button type="submit" name="login">Login</button>
		  </div>
		  <div class="container">
			<button type="button" value="Registar" class="cancelbtn" onClick="document.location.href='registar.php'">Registar</button>
			<button type="button" onclick="document.getElementById('loginform').style.display='none'" class="cancelbtn">Cancel</button>
		  </div>
		  </form>
		</div>
	</header>
</html>