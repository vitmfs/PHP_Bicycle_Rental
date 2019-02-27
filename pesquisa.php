<!--Verifica a existência de uma sessão, se não, envia para o index para efetuar login-->
<?php
session_start();
if(!file_exists('users/' . $_SESSION['username'] . '.xml')){
  header('Location: index.php');
  die;
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
	<link rel="stylesheet" href="styles/pesquisa.css"/>
</head>
<body>
<div id="top">
  <div id="pesquisa">
  <h1>Pesquisa de Bicicletas</h1>
  <!--Form para obtenção de filtros que serão usado para devolver informação que procuramos-->
    <form method="post" action="resultado.php">
      Cidade:<input class="labels" type="text" name="cidade" value=""><br>
      Marca:<select class="labels" name="marca">
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
      </select><br>
      <button id="botaoPesquisar" type="submit">Pesquisar</button>
    </form>
  </div>
</div>
<div id="wrap">
<?php
require_once "header.php";
require_once "footer.php";
require_once "fixed.php"
?>
</div>
</body>
</html>