<?php session_start();
include_once(__DIR__ . '..\..\..\backend\connection.php');
include_once(__DIR__ . '..\..\..\backend\config.php');
include_once(__DIR__ . '..\..\..\backend\conecta.php'); 
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
  <link rel="icon" href="../images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Terror</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="..\css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="..\css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="..\css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="..\css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <?php include_once('..\headerpasta.php') ?>
    <!-- end header section -->
  </div>


  <!-- catagory section -->

  <section class="catagory_section layout_padding">
    <div class="catagory_container">
      <div class="container ">
      <?php
           if ($banco->autentica($_SESSION["usuario_id"])) {
             include_once('..\autentica.php');
           }
        ?>
        <div class="heading_container heading_center">
          <h2>
            Terror
          </h2>
        </div>
        <?php
    
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="preco")
                {   $query = "SELECT * FROM livros WHERE categoria='terror' ORDER BY preco";
                    $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
                    ?>
                       <script type="text/javascript">
                          document.getElementById('select').Selected=$_POST['sort'];
                       </script>
                    <?php
                }
        else
        if($_POST['sort']=="precoh")
                {   $query = "SELECT * FROM livros WHERE categoria='terror' ORDER BY preco DESC";
                    $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
                }
    } 
    else   
            {   $query = "SELECT * FROM livros WHERE categoria='terror'";
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
            $path="../".$row['filename'];
            $descricao="../descricao.php?ID=".$row["id"];
            if($i%4==0)
            echo '<div class="row">';
            echo'
                    
                    <div class="col-sm-6 col-md-4 ">
                        <div class="presetcategoria ">
                            <div class="presetcategoria2">
                            <a href="'.$descricao.'">
                                <img class="book block-center img-responsive" src="'.$path.'">
                            </div>
                            <div class="detail-box1">
                            <hr>
                            ' . "Livro: ". $row["nome"] . '<br>
                            ' . "Autor: ".$row["autor"] . '<br>
                            ' . "Preço: R$:".$row["preco"] .'  &nbsp
                            </div>
                    </div>
                </div>
                
               </a> ';
            $i++;
            if($i%4==0)
            echo '</div>';
            }
        }
    echo '</div>';
    ?>
  </section>
  <!-- end slider section -->
</div>


  <!-- end catagory section -->

  <!-- info section -->

  <?php include_once('..\footer.php'); ?>
  
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