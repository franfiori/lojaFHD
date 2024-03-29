<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $titulo_pagina; ?></title>
		<meta charset="utf-8">
		<style type="text/css">
			@import "<?php echo URL_BASE; ?>css/estilos.css";
		</style>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div class="container">
			<a href="index.php"><img class="middle" src="logo.png" alt="Logo" width="220" height="100"></a>
			<h1><?php echo $titulo_pagina; ?></h1>
			<form method="post" action="<?php echo URL_BASE; ?>departamentos.php?acao=gravar">
				<?php
					// se há um id definido (se é uma alteração)
					if (isset($id))
					{
						echo '<input type="hidden" name="id" value="'. $id . '">';
					}
				?>
				<fieldset>
					<legend>Dados do cliente</legend>
					<div class="form-group">
						<label for="nome">Nome:</label>
						<input type="text" name="nome" id="nome" value="<?=isset($nome) ? $nome : ''; ?>">
					</div>
				</fieldset>
				<div class="form-group">
					<button type="submit">Gravar</button><button type="button" onclick="document.location='<?=URL_BASE;?>departamentos.php';">Voltar</button>
				</div>
			</form>
		</div>
	</body>
</html>