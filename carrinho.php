<?php
    
  require_once('lib/constantes.php');
  require_once('lib/funcoes.php');
  require_once('lib/acesso.php');
  require_once('lib/conexao.php');

      
      session_start();
       
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
     $titulo_pagina = 'Carrinho';
       
      if(isset($_GET['acao'])){
          
       
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
          
      
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
   
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
       
      }
?>
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
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Preco</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          <tr>
          <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{
                        require("lib/conexao.php");
                                                               $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);
                               
                              $nome  = $ln['nome'];
                              $preco = number_format($ln['preco'], 2, ',', '.');
                              $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                               
                              $total += $ln['preco'] * $qtd;
                            
                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                              </tr>';
                        }
                           $total = number_format($total, 2, ',', '.');
                           echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     }
                    if (isset($_SESSION['usuario'])) {


                        echo "
                          <script>
                               $('#loginLink').hide();
                               $('#loginLinkOk').show();
                        </script>
                       ";

                    }else {

                      echo "
                          <script>
                               $('#loginLink').show();
                               $('#loginLinkOk').hide();
                        </script>
                       ";

                    }
               ?>
    </tr>
    </thead>
        
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
            <tr>
            <td colspan="5"><a href="produtos.php">Continuar Comprando</a></td>
            <tr>
            <td colspan="5"><input type="submit" value="Finalizar Pedido"/></td>
    </tfoot>
            </form>
</table>
</div>
</body>
</html>

