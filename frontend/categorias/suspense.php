<?php session_start();
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
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

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
    <div class="catagory_container">
      <div class="container ">
      <?php
           if ($banco->autentica($_SESSION["usuario_id"])) {
             include_once('..\autentica.php');
           }
        ?>
        <div class="heading_container heading_center">
          <h2>
            Suspense
          </h2>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 ">
            <div class="presetcategoria ">
              <div class="presetcategoria2">
                <img src="" alt="">
              </div>
              <div class="detail-box1">
               <!--  <h5>
                  Stephen King (1947 - )
                </h5>
                <h6>
                  It (1986)
                </br>
                  The Shining (1977)
                </br>
                  Carrie (1974)
                </h6> -->
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="presetcategoria ">
              <div class="presetcategoria2">
                <img src="" alt="">
              </div>
              <div class="detail-box1">
                <!-- <h5>
                  Clarice Lispector (1920 - 1977)
                </h5>
                <h6>
                  Perto do cora????o selvagem (1943)
                </br>
                  La??os de fam??lia (1960)
                </br>
                  A hora da estrela (1977)
                </h6> -->
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="presetcategoria ">
              <div class="presetcategoria2">
                <img src="" alt="">
              </div>
              <div class="detail-box1">
                <!-- <h5>
                  J. K. Rowling (1965 - )
                </h5>
                <h6>
                  Harry Potter e a Pedra Filosofal (1997)
                </br>
                  Animais Fant??sticos e Onde Habitam (2001)
                </br>
                  Morte s??bita (2012)
                </h6> -->
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="presetcategoria ">
              <div class="presetcategoria2">
                <img src="" alt="">
              </div>
              <div class="detail-box1">
                <!-- <h5>
                  Suzanne Collins (1962 - )
                </h5>
                <h6>
                  Jogos vorazes (2008)
                </br>
                  Em chamas (2009)
                </br>
                  A esperan??a (2010)
                </h6> -->
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="presetcategoria ">
              <div class="presetcategoria2">
                <img src="" alt="">
              </div>
              <div class="detail-box1">
              <!--   <h5>
                  J. R. R. Tolkien (1892 - 1973)
                </h5>
                <h6>
                  O Hobbit (1937)
                </br>
                  O Senhor dos An??is (1954)
                </br>
                  O Silmarillion (1977)
                </h6> -->
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="presetcategoria ">
              <div class="presetcategoria2">
                <img src="" alt="">
              </div>
              <div class="detail-box1">
                <!-- <h5>
                  Fernando Pessoa (1888 - 1935)
                </h5>
                <h6>
                  Tabacaria (1933)
                </br>
                  Mensagem (1934)
                </br>
                  O Guardador de Rebanhos (1925)
                </h6> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container ">
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
          <div class="container ">
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
                    Mem??rias P??stumas de Br??s Cubas (1881)
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
          <div class="container ">
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
                    Ang??stia (1936)
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
        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  <!-- end slider section -->
</div>


<section class="catagory_section layout_padding">
  <div class="catagory_container">
    <div class="container ">
      <div class="row">
        <div class="col-sm-6 col-md-4 ">
          <div class="presetcategoria ">
            <div class="presetcategoria2">
              <img src="" alt="">
            </div>
            <div class="detail-box1">
             <!--  <h5>
                Paulo Coelho (1947 - )
              </h5>
              <h6>
                O alquimista (1988)
              </br>
                Onze minutos (2003)
              </br>
                Veronika Decide Morrer (1998)
              </h6> -->
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="presetcategoria ">
            <div class="presetcategoria2">
              <img src="" alt="">
            </div>
            <div class="detail-box1">
             <!--  <h5>
                Jos?? de Alencar (1829 - 1877)
              </h5>
              <h6>
                Iracema (1865)
              </br>
                Senhora (1875)
              </br>
                O Guarani (1857)
              </h6> -->
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="presetcategoria ">
            <div class="presetcategoria2">
              <img src="" alt="">
            </div>
            <div class="detail-box1">
              <!-- <h5>
                Cec??lia Meireles (1901 - 1964)
              </h5>
              <h6>
                Ou Isto ou Aquilo (1964)
              </br>
                Romanceiro da Inconfid??ncia (1953)
              </br>
                Vaga m??sica (1942)
              </h6> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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