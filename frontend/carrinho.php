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

  <title>Home</title>

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
<?php
  $usuario=$_SESSION['usuario_id'];

if(isset($_GET['remove']))
{  $produto=$_GET['remove'];
   $query="DELETE FROM carrinho where usuario='$usuario' AND produto_id='$produto'";
   $result=mysqli_query($connection,$query);
?>
   <script type="text/javascript">
        alert("Item Successfully Removed");
   </script>
<?php                  
 } 
 ?>
 <section class="catagory_section layout_padding">
    <div class="catagory_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Carrinho
          </h2>
        </div>
<?php

	if(isset($_SESSION['usuario_id']))
	    {   
              	if(isset($_GET['ID']))
	            {   
                        $produto=$_GET['ID'];
                        $query="SELECT * from carrinho where usuario='$usuario' AND produto_id='$produto'";
                        $result=mysqli_query($connection,$query);
                        $row = mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result)==0)
	                         { 
                            $query="INSERT INTO carrinho (usuario, produto_id) values('$usuario','$produto')"; 
                            $result=mysqli_query($connection,$query);
                            }
                            else
                           { 
                             $query="SELECT * from carrinho where usuario='$usuario' AND produto_id='$produto'";
	                           $result=mysqli_query($connection,$query);
                            }
                    }
              	$query="SELECT id,categoria,nome,autor,preco,filename FROM carrinho INNER JOIN livros ON carrinho.produto_id=livros.id 
              	        WHERE usuario='$usuario'";
	        $result=mysqli_query($connection,$query); 
                $total=0;
                if(mysqli_num_rows($result)>0)
                {    $i=1;
                     $j=0;
                     while($row = mysqli_fetch_assoc($result))
                     {       $path = $row['filename'];
                             $Stotal = $row['preco'];
                             if($i % 2 == 1)  $offset= 1;
                             if($i % 2 == 0)  $offset= 2;                                                
                             if($j%2==0)
                                 echo '<div class="row justify-content-md-center">'; 
                                 echo '                
                                      <div class="panel col-xs-12 col-sm-4 col-sm-offset-'.$offset.' col-md-4 col-md-offset-'.$offset.' col-lg-4 col-lg-offset-'.$offset.' text-center" style="color:dark;font-weight:800;">
                                          <div class="panel-heading">Pedido n.'. $i .'
                                          </div>
                                          <div class="panel-body">
			                                                <img class="image-responsive block-center" src="'.$path.'" style="height :300px;"> <br>
           							                                               Titulo : '.$row['nome'].'  <br>                                                                      	 
                                                      									Autor : '.$row['autor'].' <br>                            	                                                            								
                                                      									Preço : '.$row['preco'].' <br>
                                                                       <a href="carrinho.php?remove='.$row['id'].'" class="btn btn-sm" 
                                                                          style="bg-light;color:black;font-weight:800;">
                                                                          Remover
                                                                        </a>
                                        </div>
                                    </div>';
                               if($j % 2==1)
                                   echo '</div>';                                 
                               $total=$total + $Stotal; 
                               $i++;
                               $j++;                                                 
                     } 
                    
                    echo '<div class="container">
                              <div class="row justify-content-md-center baixomasntanto2">  
                                 <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center" style="color:dark;font-weight:800;">
                                     <div class="panel-heading">TOTAL
                                     </div>
                                      <div class="panel-body">'.$total.'
                                     </div>
                                 </div>
                               </div>
                          </div>
                         ';
                     echo '<div class="row justify-content-md-center baixomasntanto">
                             <div class="col-3">
                                  <a href="categories.php" class="btn btn-lg btn-outline-secondary" style="bg-light;color:dark;font-weight:800;">Continuar comprando</a>
                             </div>
                             <div class="col-3">
                                  <a href="carrinho.php?place=true" class="btn btn-lg btn-outline-secondary" style="bg-light;color:dark;font-weight:800;">Finalizar compra</a>
                             </div>
                           </div>
                           ';
                } 
               else
                     {  
                        echo '     
                         <div class="row justify-content-md-center baixo">
                            <div class="col-3">
                                 <span class="text-center" style="color:dark;font-weight:bold;font-size:30px">Carrinho vazio</span>
                             </div>
                             <div class="col-3">
                                  <a href="categories.php" class="btn btn-lg btn-outline-secondary" style="bg-light;color:dark;font-weight:800;">Faça algumas compras!</a>
                             </div>
                          </div>';
                     }               
	    }
        echo '</div>
        </div>';

	?>

    <?php include_once('footer.php'); ?>

<!-- end info section -->

<!-- footer section -->
<!--  <footer class="footer_section">
  <div class="container">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </div>
</footer> -->
<!-- footer section -->

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