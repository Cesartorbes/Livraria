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
  <meta http-equiv="X-UA-Compatible" connectiontent="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" connectiontent="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="iconnection" href="images/faviconnection.png" type="image/gif" />
  <meta name="keywords" connectiontent="" />
  <meta name="description" connectiontent="" />
  <meta name="author" connectiontent="" />

  <title>Mudar dps</title>

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
    <div class="catagory_connectiontainer">
      <div class="connectiontainer ">
      <?php
           if ($banco->autentica($_SESSION["usuario_id"])) {
             include_once('..\autentica.php');
           }
        ?>
      </div>
    </div>
    <?php
    
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="preco")
                {   $query = "SELECT * FROM livros WHERE categoria='suspense' ORDER BY preco";
                    $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
                    ?>
                       <script type="text/javascript">
                          document.getElementById('select').Selected=$_POST['sort'];
                       </script>
                    <?php
                }
        else
        if($_POST['sort']=="precoh")
                {   $query = "SELECT * FROM livros WHERE categoria='suspense' ORDER BY preco DESC";
                    $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
                }
    } 
    else   
            {   $query = "SELECT * FROM livros WHERE categoria='suspense'";
                $result = mysqli_query ($connection,$query)or die(mysqli_error($connection));
            } 
    $i=0;
    echo '<div class="connectiontainer-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:rgb(228, 55, 25);text-transform:uppercase;margin-bottom:0px;"> Suspense </h2>
           </div>
        </div>      
        <div class="connectiontainer fluid">
             <div class="row">
                  <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                           <label for="sort">Sort by &nbsp: &nbsp</label>
                            <select name="sort" id="select" onchange="form.submit()">
                                <option value="default" name="default"  selected="selected">Select</option>
                                <option value="preco" name="preco">Low To High preco </option>
                                <option value="precoh" name="precoh">Highest To Lowest preco </option>
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
            if($i%4==0)
            echo '<div class="row">';
            echo'
                <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                    <div class="book-block" style="border :3px solid #DEEAEE;">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        <hr>
                         ' . $row["nome"] . '<br>
                         ' . $row["autor"] . '<br>
                        ' . $row["preco"] .'  &nbsp
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
  <section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="connectiontainer ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box1">
                <!--   <h5>
                    Autores da literatura brasileira
                  </h5>
                  <h1>
                    Carlos Drummond de Andrade (1902 - 1987)
                  </h1>
                  <h6>
                    Poemas (1982)
                  </br>
                    Alguma poesia (1930)
                  </br>
                    Sentimento do Mundo (1940)
                  </h6> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="connectiontainer ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box1">
                  <!-- <h5>
                    Autores da literatura brasileira
                  </h5>
                  <h1>
                    Machado de Assis (1839 - 1908)
                  </h1>
                  <h6>
                    Dom Casmurro (1899)
                  </br>
                    Memórias Póstumas de Brás Cubas (1881)
                  </br>
                    O Alienista (1882)
                  </h6> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="connectiontainer ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box1">
                 <!--  <h5>
                    Autores da literatura brasileira
                  </h5>
                  <h1>
                    Graciliano Ramos (1892 - 1953)
                  </h1>
                  <h6>
                    Vidas Secas (1938)
                  </br>
                    S. Bernardo (1934)
                  </br>
                    Angústia (1936)
                  </h6> -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="carousel_btn_box">
        <a class="carousel-connectiontrol-prev" href="#customCarousel1" role="button" data-slide="prev">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-connectiontrol-next" href="#customCarousel1" role="button" data-slide="next">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  <!-- end slider section -->
</div>



  <?php include_once('..\footer.php'); ?>

  <!-- end info section -->

  <!-- footer section -->
 <!--  <footer class="footer_section">
    <div class="connectiontainer">
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