<?
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

  <title>Revenda de livros</title>

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
      <?php

      if (isset($_SESSION["usuario_id"])){
        $banco->autentica($_SESSION["usuario_id"]);
        include_once('autenticaRevenda.php');
      }
      ?>
        <div class="heading_container heading_center">
          <h2>
            Revenda de livros
          </h2>
        </div>
      </div>
      <?php
    
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="preco")
                {   $query = "SELECT * FROM vendas ORDER BY preco";
                    $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
                    ?>
                       <script type="text/javascript">
                          document.getElementById('select').Selected=$_POST['sort'];
                       </script>
                    <?php
                }
        else
        if($_POST['sort']=="precoh")
                {   $query = "SELECT * FROM vendas ORDER BY preco DESC";
                    $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
                }
    } 
    else   
            {   $query = "SELECT * FROM vendas";
                $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
            } 
    $i=0;
    echo '      
        <div class="connectiontainer fluid">
             <div class="row">
                  <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                           <label for="sort">Ordenar por&nbsp: &nbsp</label>
                            <select name="sort" id="select" onchange="form.submit()">
                                <option value="default" name="default"  selected="selected"></option>
                                <option value="preco" name="preco">Menor preço</option>
                                <option value="precoh" name="precoh">Maior preço </option>
                            </select>
                       </form>
                  </div>
              </div>
        </div>';
        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $vendas="vendas.php?ID=".$row["id"];
            $path=$row['filename'];
            if($i%2==0)
            echo '<div class="row">';
            
            if (isset($_SESSION["usuario_id"]) && $banco->autentica($_SESSION["usuario_id"])){
            echo'
            <div class="container">
            <div class="row justify-content-md-center">
            <div class="revenda col-8">
                  <a href="'.$vendas.'">
                  <img align="left" class="imagemRevenda" src="'.$path.' ">
                  <div class="conteudoRevenda">              
              ' . "Nome do vendedor: ". $row["nome"] . '<br>
              ' . "Livro: ".$row["livro"] . '<br>
              ' . "Preço: R$:".$row["preco"]. ' <br>   
              ' . "Cidade do vendedor: ".$row["cidade"] . '<br>      
              ' . "Telefone do vendedor: ".$row["telefone"] . '    
                </div>
                </a>
                <a class="dropdown-item excluir" href=../backend/excluir.php?registro=1&id=' . $row["id"] . '>Excluir Venda</a>
            </div>
          </div>
          </div>
                 ';
            }
            else{
              echo'
                    
              <div class="container">
              <div class="row justify-content-md-center">
              <div class="revenda col-8">
              <a href="'.$vendas.'">
                    <img align="left" class="imagemRevenda" src="'.$path.' ">
                    <div class="conteudoRevenda">              
                ' . "Nome do vendedor: ". $row["nome"] . '<br>
                ' . "Livro: ".$row["livro"] . '<br>
                ' . "Preço: R$:".$row["preco"]. ' <br>   
                ' . "Cidade do vendedor: ".$row["cidade"] . '<br>      
                ' . "Telefone do vendedor: ".$row["telefone"] . '    
                  </div>
                  </a> 
              </div>
            </div>
            </div>
                  
              ';
            }
            $i++;
            if($i%2==0)
            echo '</div>';
            }
        }
    echo '</div>';
    ?>
    </div>
  </section>
  
  <?php include_once('footer.php'); ?>

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>