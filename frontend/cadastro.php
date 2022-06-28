<?php session_start();
include_once(__DIR__ . '..\..\backend\conecta.php');
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

  <title>Mudar dps</title>

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
                                        <h3 class="text-center font-weight-light my-4">Cadastro de Livros usados</h3>
                                        <div class="card-body">
                                            <form method="post" name="registration" action="">
                                                <div class="form-floating mb-3">
                                                    <label for="nomelivro">Nome do livro:</label>
                                                    <input type="hidden" value="3" name="registro" id="registro">
                                                    <input class="form-control" id="nomelivro" type="text" name="nomelivro"
                                                        placeholder="Insira o nome do livro" required />
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="descricao">Descrição</label>
                                                    <input class="form-control" id="descricao" type="text" name="descricao"
                                                        placeholder="Descrição do livro" />
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="cidade">Cidade:</label>
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" type="texte"
                                                                placeholder="Cidade do vendedor" name="cidade" id="cidade" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <label for="telefone">Telefone:</label>
                                                            <input class="form-control"
                                                                type="tel" placeholder="Insira o seu telefone"
                                                                name="telefone" id="telefone" />
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-floating mb-3">
                                                    <label for="preco">Preço:</label>
                                                 <input class="form-control" id="preco" type="number" name="preco" min="0" max="10000" step="any"
                                                     placeholder="Insira o preço desejado" />
                                             </div> 
                                             <!-- <div class="form-floating mb-3">
                                                    <label for="foto">Foto do livro:</label>
                                                 <input class="form-control" id="foto" type="image" name="foto"
                                                     placeholder="Insira uma foto do livro" />
                                             </div>  -->      
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Inserir livro</button></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center py-3">                       
                                            <div class="small"></div>
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