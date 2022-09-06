<?php 
include_once(__DIR__ . '..\..\backend\connection.php');
include_once(__DIR__ . '..\..\backend\config.php');
include_once(__DIR__ . '..\..\backend\conecta.php');
$banco = new Banco;
if(isset($_SESSION['usuario_id']))
{$banco->usuario($_SESSION["usuario_id"]);
  $id=$_SESSION['usuario_id'];
  $query = "SELECT nome from usuario where usuario_id = $id";
  $result = mysqli_query($connection,$query)or die(mysql_error());
  $row = mysqli_fetch_assoc($result);
  echo('  <header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="..\index.php">
        <span>
          Bookstore
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span> 
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link pl-lg-0" href="../index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../about.php"> Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categories.php">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../destroy.php"> Olá ' .$row['nome']. '</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../carrinho.php">Carrinho</a>
          </li>
        </ul>
        <from class="search_form">
          <input type="text" class="form-control" placeholder="Pesquise aqui...">
          <button class="" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button> 
        </from>
      </div>
    </nav>
  </div>
</header>');
  }
else{
  echo('  <header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="../index.php">
        <span>
          Bookstore
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link pl-lg-0" href="../index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../about.php"> Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categories.php">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../entrar.php">Perfil</a>
          </li>
        </ul>
        <from class="search_form">
          <input type="text" class="form-control" placeholder="Pesquise aqui...">
          <button class="" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button> 
        </from>
      </div>
    </nav>
  </div>
</header>');
}