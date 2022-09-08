<?php
include_once(__DIR__ . '..\..\backend\conecta.php');
?>

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
</script>

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

  <title>Cadastro de funcionários</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />


</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <?php include_once('header.php') ?>
    <!-- end header section -->
  </div>

  <section class="catagory_section layout_padding">
    <div class="catagory_container">
      <div class="container ">
        <body class="bg-primary">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4"></h3>
                                        </div>
                                        <h3 class="text-center font-weight-light my-4">Cadastro de funcionário</h3>
                                        <div class="card-body">
                                            <form method="post" name="registration" action="../backend/inserir.php">
                                                <div class="form-floating mb-3">
                                                    <label for="nome">Nome:</label>
                                                    <input type="hidden" value="1" name="registro" id="registro">
                                                    <input class="form-control" id="nome" type="text" name="nome"
                                                        placeholder="Insira o nome do funcionário" required />
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="inputEmail">E-mail:</label>
                                                    <input class="form-control" id="inputEmail" type="email" name="email"
                                                        placeholder="nome@exemplo.com" required/>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="telefone">Telefone:</label>
                                                    <input class="form-control" id="telefone" type="text" name="telefone"
                                                        placeholder="Insira o telefone do funcionário" required/>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="cidade">Cidade:</label>
                                                    <input class="form-control" id="cidade" type="text" name="cidade"
                                                        placeholder="Insira a cidade do funcionário" required/>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="senha">Senha:</label>
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" type="password"
                                                                placeholder="Crie uma senha para o funcionário" name="senha" id="senha" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <label for="inputPasswordConfirm">Confirme a senha:</label>
                                                            <input class="form-control" id="inputPasswordConfirm"
                                                                type="password" placeholder="Confirme a Senha"
                                                                name="confirmpassword" id="confirmpassword" required/>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="form-floating mb-3">
                                                    <label for="numero">Código do funcionário:</label>
                                                    <input class="form-control" id="numero" type="number" name="numero"
                                                        placeholder="Insira o código do funcionário" required/>
                                                </div>
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Criar Conta</button></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center py-3">                       
                                            <div class="small"><a href="index.php">Página Inicial</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
        </body>
      </div>
    </div>
  </section>
 
  <?php include_once('footer.php'); ?>

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>