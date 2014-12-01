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
			<table>
				<thead>
					<tr>
						<th>Código</th><th>Nome</th><th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($registros as $registro)
						{
							echo "
								<tr>
									<td>" . $registro['id'] . "</td>
									<td>{$registro['nome']}</td>
									<td class='acoes'>
										<a href='" . URL_BASE . "departamentos.php?acao=alterar&id={$registro['id']}'>A</a>&nbsp;&nbsp;
										<a href='javascript:if(confirm(\"Confirma a exclusão?\")){document.location=\"" . URL_BASE . "departamentos.php?acao=excluir&id={$registro['id']}\";}'>E</a>
									</td>
								</tr>
							";
						}
					?>
				</tbody>
			</table>
			<div class="form-group"><button type="button" onclick="document.location='<?=URL_BASE;?>departamentos.php?acao=incluir';">Novo</button></div>
		</div><!-- container -->
	</body>
</html>