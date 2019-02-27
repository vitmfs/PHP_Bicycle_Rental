<!--
Quando a opção logout é seleccionada, é redireccionado para aqui, 
fazendo o destroy da sessão e reencaminhando para a pagina index
-->
<?php
	session_start();
	session_destroy();
	header('Location: index.php');
?>