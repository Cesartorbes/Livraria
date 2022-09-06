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
 
  <title>Descrição da venda</title>
 
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
 
 
  <!-- catagory section -->
 
  <section class="catagory_section layout_padding">
    <div class="catagory_container">
      <div class="container ">  
        <?php
   
    $descricao=$_GET['ID'];
    $query = "SELECT * FROM vendas WHERE id='$descricao'";
    $result = mysqli_query ($connection,$query)or die(mysql_error());
 
        if(mysqli_num_rows($result) > 0)
        {  
            while($row = mysqli_fetch_assoc($result))
            {
            $path=$row['filename'];
echo '
  <div class="container-fluid" id="books">
    <div class="row">
      <div class="col-sm-10 col-md-6">
                         <img class="center-block img-responsive" src="'.$path.'" height="550px" style="padding:20px;">
      </div>
      <div class="col-sm-10 col-md-4 col-md-offset-1">
        <h2> '. $row["livro"] . '</h2>
                                <span style="color:#00B9F5;">
                                Vendedor: '.$row["nome"].'
                                </span>
        <hr>            
                                <span style="font-weight:bold;"> R$ '.$row["preco"].' </span>';
                               
echo'                          
 
      </div>
    </div>
          </div>
          
     ';
echo '
          <div class="container-fluid" id="description">
    <div class="row">
      <h2> Descrição </h2>
                        <p>'.$row['descricao'] .'</p>
                        <pre style="background:inherit;border:none;">
                        <div class="container-fluid align-items-center justify-content-center">
   Id do produto    '.$row["id"].'   <hr>
   Livro            '.$row["livro"].' <hr>
   Vendedor         '.$row["nome"].' <hr>
   Telefone         '.$row["telefone"].' <hr>
   E-mail           '.$row["email"].' <hr>
   Cidade           '.$row["cidade"].' <hr>
                        </pre>
                        </div>
    </div>
  </div>
';
 
           
            }
        }
    echo '</div>';
    ?>
        </div>
      </div>
    </div>
  </section>
 
  <!-- end catagory section -->
 
  <!-- info section -->
 
  <?php include_once('footer.php'); ?>
 
 
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
 
</body>
 
</html>
