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
				<tbody>
<?php
     
    $sql = "SELECT * FROM produtos";
    $qr = mysql_query($sql) or die(mysql_error());
      while($ln = mysql_fetch_assoc($qr)){
         echo ''.$ln['nome'].' <br />';
         echo 'Preço : R$ '.number_format($ln['preco'], 2, ',', '.').'<br />';
         echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'">Comprar</a>';
         echo '<br /><hr />';
     }
?>
				</tbody>
			</table>
			<div class="form-group"><button type="button"
				onclick="document.location='<?=URL_BASE;?>produtos.php?acao=incluir';">Novo</button></div>
		</div><!-- container -->
	</body>
</html>