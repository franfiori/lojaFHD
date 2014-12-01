<?php
	session_start();

	require_once('lib/constantes.php');
	require_once('lib/funcoes.php');
	require_once('lib/acesso.php');
	require_once('lib/conexao.php');

	verificar_login();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Loja virtual - Área Administrativa - Início</title>
		<meta charset="utf-8">
		<style type="text/css">
			@import "<?php echo URL_BASE; ?>css/estilos.css";
		</style>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div class="container">
			<a href="index.php"><img class="middle" src="logo.png" alt="Logo" width="220" height="100"></a>
			<h1>Menu principal</h1>
			<nav>
				<li><a href="<?php echo URL_BASE;?>">Início</a></li>
				<li><a href="<?php echo URL_BASE.'carrinho.php';?>">Carrinho</a></li>
				<li><a href="<?php echo URL_BASE.'produtos.php';?>">Produtos</a></li>
				<li><a href="<?php echo URL_BASE.'departamentos.php'?>">Departamentos</a></li>
				<li><a href="<?php echo URL_BASE.'clientes.php';?>">Clientes</a></li>
				<li><a href="<?php echo URL_BASE.'usuarios.php';?>">Usuários</a></li>
				<li><a href="<?php echo URL_BASE.'login.php?acao=sair';?>">Sair</a></li>
			</nav>
		</div>
	</body>
</html>