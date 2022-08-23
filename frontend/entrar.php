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

  <title>Login</title>

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
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4"></h3></div>
                                        <h3 class="text-center font-weight-light my-4">Login de Usuário</h3>
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="form-floating mb-3">
                                                    <label for="inputEmail">Endereço de e-mail:</label>
                                                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Endereço do Email" required />
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="inputPassword">Senha:</label>
                                                    <input class="form-control" id="inputPassword" type="password" placeholder="Senha" name="password" required />
                                                </div>
                                    
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button  class="btn btn-primary"  type="submit" name="login">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center py-3"> 
                                            <div class="small"><a href="cadastrar.php">Novo no site? Cadastre-se!</a></div>
                                            <hr />
                                               <div class="small"><a href="index.php">Página Inicial</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
          
        </div>
      </div>
    </div>
  </section>

  <?php include_once('footer.php'); ?>


  <?php session_start();
include_once(__DIR__ . '..\..\backend\conecta.php');
if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $banco = new Banco;
    $conn = $banco->conectar();    
    
    $stmt = $conn->prepare('SELECT * FROM usuario WHERE email = :email AND senha = :senha');
    $stmt->execute([
        ':email' => $email,
        ':senha' => $password
        ]
    );    
    $ret = $stmt->fetch();
    
    if($ret){        
        $_SESSION['usuario_id']=$ret['usuario_id'];
        $_SESSION['uemail']=$ret['email'];
        echo "<script>window.location.href='index.php'</script>";
    }
    else{
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9' ></script>

        <script>
            Swal.fire({ 
            icon: 'error',
            title: 'Oops...',
            text: 'Dados incorretos.'
            })
        </script>";
    }
  }
  ?>





  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>