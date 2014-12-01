<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Loja virtual - Área Administrativa - Identificação do Usuário</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<style type="text/css">
			@import "<?php echo URL_BASE; ?>css/estilos.css";
		</style>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div class="container">
			<a href="index.php"><img class="middle" src="logo.png" alt="Logo" width="220" height="100"></a>
			<h1>Identificação do usuário</h1>
			<form method="post" action="<?php echo URL_BASE . 'login.php?acao=autenticar';?>">
				<fieldset>
					<legend>Dados do usuário</legend>
					<div class="form-group">
						<label for="login">Login:</label>
						<input type="text" name="login" id="login">
					</div>
					<div class="form-group">
						<label for="senha">Senha:</label>
						<input type="password" name="senha" id="senha">
					</div>
					<div class="form-group">
						<button type="submit">Enviar</button>
					</div>
				</fieldset>
			</form>
		</div>
	</body>
</html>