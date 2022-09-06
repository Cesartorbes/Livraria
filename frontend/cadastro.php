<?php
include_once(__DIR__ . '..\..\backend\connection.php');
include_once(__DIR__ . '..\..\backend\config.php');
include_once(__DIR__ . '..\..\backend\conecta.php'); 
$banco = new Banco;

$Revenda = FALSE;

if (isset($_POST['submit'])) {
    /*
     * Read posted values.
     */
    $RevendaNome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $RevendaLivro = isset($_POST['livro']) ? $_POST['livro'] : '';
    $RevendaDescricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
    $RevendaPreco = isset($_POST['preco']) ? $_POST['preco'] : '';
    $RevendaTelefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $RevendaEmail = isset($_POST['email']) ? $_POST['email'] : '';
    $RevendaCidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';

    /*
     * Validate posted values.
     */

    if (empty($RevendaNome)) {
        $errors[] = 'Coloque o seu nome';
    }

    if (empty($RevendaLivro)) {
        $errors[] = 'Coloque o nome do livro';
    }

    if (empty($RevendaDescricao)) {
        $errors[] = 'Coloque uma descrição sobre o livro';
    }

    if (empty($RevendaPreco)) {
        $errors[] = 'Coloque o preço do livro';
    } 

    if (empty($RevendaTelefone)) {
        $errors[] = 'Coloque o seu número de telefone';
    }

    if (empty($RevendaEmail)) {
        $errors[] = 'Coloque o seu e-mail';
    }
        
    if (empty($RevendaCidade)) {
        $errors[] = 'Coloque a sua cidade';
    }

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
    }

    /*
     * List of file names to be filled in by the upload script 
     * below and to be saved in the db table "products_images" afterwards.
     */
    $filenamesToSave = [];

    $allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);

    /*
     * Upload files.
     */
    if (!empty($_FILES)) {
        if (isset($_FILES['file']['error'])) {
            foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
                if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                    $errors[] = 'You did not provide any files.';
                } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                    $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                        $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFilePath;
                            }
                        } else {
                            $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                        }
                    } else {
                        $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                    }
                }
            }
        }
    }
    if (!isset($errors)) {

        foreach ($filenamesToSave as $filename) {

            $sql = 'INSERT INTO vendas (
                nome,
                livro,
                descricao,
                preco,
                telefone,
                email,
                cidade,
                filename
            ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?
            )';

        $statement = $connection->prepare($sql);

        $statement->bind_param('sssdssss', $RevendaNome, $RevendaLivro, $RevendaDescricao, $RevendaPreco, $RevendaTelefone, $RevendaEmail, $RevendaCidade, $filename);

        $statement->execute();

        $statement->close();
    
        }

    }

    /*
    * Close the previously opened database connection.
    * 
    * @link http://php.net/manual/en/mysqli.close.php
    */
    $connection->close();

    $Revenda = TRUE;

    /*
    * Reset the posted values, so that the default ones are now showed in the form.
    * See the "value" attribute of each html input.
    */
    $RevendaNome = $RevendaLivro = $RevendaDescricao = $RevendaPreco = $RevendaTelefone = $RevendaEmail = $RevendaCidade = NULL;
}   


?> 

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $(document).ready(function()
{	$('#email').focusout(function()
	{	$('#email').filter(function()
		{	var emil=$('#email').val();
            var emailReg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            if(!emailReg.test(emil))
            {	alert('Email inválido');
            }else
            {	
            }
        })
    });
});
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

  <title>Cadastro de livros</title>

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
    <?php include_once('headernormal.php') ?>
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
                                            <form action="cadastro.php" method="post" enctype="multipart/form-data">
                                                <div class="form-floating mb-3">
                                                    <label for="nome">Nome do vendedor:</label>
                                                    <input class="form-control" id="nome" type="text" name="nome"
                                                        placeholder="Insira o nome do vendedor" required value="<?php echo isset($RevendaNome) ? $RevendaNome : ''; ?>"/>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="livro">Nome do livro:</label>
                                                    <input class="form-control" id="livro" type="text" name="livro"
                                                        placeholder="Insira o nome do livro"  required value="<?php echo isset($RevendaLivro) ? $RevendaLivro : ''; ?>"/>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="descricao">Descrição</label>
                                                    <input class="form-control" id="descricao" type="text" name="descricao"
                                                        placeholder="Campo livre para descricão do livro"  required value="<?php echo isset($RevendaDescricao) ? $RevendaDescricao : ''; ?>"/>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="preco">Preço:</label>
                                                    <input class="form-control" id="preco" type="number" min="0" max="10000" step="any" name="preco"
                                                     placeholder="Insira o preço do livro"  required value="<?php echo isset($RevendaPreco) ? $RevendaPreco : ''; ?>"/>                                              
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label for="telefone">Telefone:</label>
                                                        <input class="form-control"
                                                            type="text" placeholder="Insira o seu telefone"
                                                            name="telefone" id="telefone"  required value="<?php echo isset($RevendaTelefone) ? $RevendaTelefone : ''; ?>"/>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="preco">E-mail:</label>
                                                    <input class="form-control" id="email" type="text" name="email"
                                                        placeholder="Insira seu email"  required  value="<?php echo isset($RevendaEmail) ? $RevendaEmail : ''; ?>"/>
                                                </div>   
                                                <div class="form-floating mb-3">
                                                    <label for="preco">Cidade:</label>
                                                    <input class="form-control" id="cidade" type="text" name="cidade"
                                                        placeholder="Insira a sua cidade" required  value="<?php echo isset($RevendaCidade) ? $RevendaCidade : ''; ?>"/>
                                                </div> 
                                                <div class="form-floating mb-3">
                                                    <label for="file">Imagem:</label>
                                                    <input type="file" id="file" name="file[]" multiple>
                                                </div>  
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block" href="revenda.php">Inserir venda</button></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center py-3">                       
                                            <div class="medium"><a href="revenda.php">Página de Revendas</a></div>
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