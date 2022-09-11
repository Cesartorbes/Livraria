
<?php

include_once(__DIR__ . '..\..\backend\connection.php');
include_once(__DIR__ . '..\..\backend\config.php');
include_once(__DIR__ . '..\..\backend\conecta.php'); 
$banco = new Banco;

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Carrinho</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <!-- Principal CSS do Bootstrap -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Estilos customizados para esse template -->
  <link href="form-validation.css" rel="stylesheet">
  </head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $("#data").mask("##/##/####");
  </script>
  <body class="bg-light">
  <?php 
  include_once('header.php'); 
  $usuario=$_SESSION['usuario_id'];
  $id=$_SESSION['usuario_id'];
  $query = "SELECT usuario.nome, usuario.email, usuario.cidade, usuario.telefone, SUM(preco) from usuario inner join carrinho on carrinho.usuario = usuario.usuario_id inner join livros on livros.id = carrinho.produto_id  where usuario_id = $id";
  $result = mysqli_query($connection,$query)or die(mysql_error());
  $row = mysqli_fetch_assoc($result);

  if(isset($_GET['place']))
  {  
     $query="DELETE FROM carrinho where usuario='$usuario'";
     $result=mysqli_query($connection,$query);
     echo "<html>
     <body>
     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
  
     <script>
         Swal.fire({
             icon: 'success',
             title: 'Compra realizada',
             text: 'A sua compra foi realizada!'
         }).then(function() {
             window.location = 'index.php';
         });
     </script></body></html>";                
   }
  ?>
    <div class="container">
    <br>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu carrinho</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BRL)</span>
              <strong>R$<?php echo round($row['SUM(preco)'],2)?></strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Endereço de cobrança</h4>
          <form class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="primeiroNome">Nome</label>
                <input type="text" class="form-control" id="primeiroNome" value="<?php echo $row['nome']?>" required readonly="readonly">
            </div>

            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" placeholder="fulano@exemplo.com" value="<?php echo $row['email']?>">
            </div>

            <div class="mb-3">
              <label for="endereco">Cidade</label>
              <input type="text" class="form-control" id="endereco" placeholder="Rua dos bobos, nº 0" required value="<?php echo $row['cidade']?>">
            </div>

            <div class="mb-3">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" placeholder="telefone" value="<?php echo $row['telefone']?>">
            </div>

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credito" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credito">Cartão de crédito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debito" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debito">Cartão de débito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-nome">Nome no cartão</label>
                <input type="text" class="form-control" id="cc-nome" placeholder="" required>
                <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                <div class="invalid-feedback">
                  O nome que está no cartão é obrigatório.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-numero">Número do cartão de crédito</label>
                <input type="text" class="form-control" id="cc-numero" placeholder="" required>
                <div class="invalid-feedback">
                  O número do cartão de crédito é obrigatório.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="data">Data de expiração</label>
                <input type="text" class="form-control" id="data" placeholder="" required>
                <div class="invalid-feedback">
                  Data de expiração é obrigatória.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Código de segurança é obrigatório.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <a href="pagamento.php?place=true">
                <button class="btn btn-primary btn-lg btn-block" type="button" >Finalizar pedido</button>
            </a>
          </form>
        </div>
      </div>
      <br>

    </div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
  <?php include_once('footer.php'); ?>

</html>
