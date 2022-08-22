<?php 
session_start();
include_once(__DIR__ . '..\..\backend\connection.php');
include_once(__DIR__ . '..\..\backend\config.php');

$livroSaved = FALSE;

if (isset($_POST['submit'])) {
    /*
     * Read posted values.
     */
    $LivroCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $LivroNome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $LivroAutor = isset($_POST['autor']) ? $_POST['autor'] : '';
    $LivroPreco = isset($_POST['preco']) ? $_POST['preco'] : '';

    /*
     * Validate posted values.
     */

    if (empty($LivroCategoria)) {
        $errors[] = 'Coloque uma categoria';
    }

    if (empty($LivroNome)) {
        $errors[] = 'Coloque o nome do livro';
    }

    if (empty($LivroAutor)) {
        $errors[] = 'Coloque o autor do livro';
    }

    if (empty($LivroPreco)) {
        $errors[] = 'Coloque o preço do livro';
    }

    /*
     * Create "uploads" directory if it doesn't exist.
     */
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

    /*
     * Save product and images.
     */
     if (!isset($errors)) {
        /*
         * The SQL statement to be prepared. Notice the so-called markers, 
         * e.g. the "?" signs. They will be replaced later with the 
         * corresponding values when using mysqli_stmt::bind_param.
         * 
         * @link http://php.net/manual/en/mysqli.prepare.php
         */
        
        foreach ($filenamesToSave as $filename) {
            $sql = 'INSERT INTO livros (
                    categoria,
                    nome,
                    autor,
                    preco,
                    filename
                ) VALUES (
                        ?, ?, ?, ?, ?
                )';

            $statement = $connection->prepare($sql);

            $statement->bind_param('sssds', $LivroCategoria ,$LivroNome, $LivroAutor, $LivroPreco, $filename);

            $statement->execute();

            $statement->close();
        }

        /*
         * Close the previously opened database connection.
         * 
         * @link http://php.net/manual/en/mysqli.close.php
         */
        $connection->close();

        $livroSaved = TRUE;

        /*
         * Reset the posted values, so that the default ones are now showed in the form.
         * See the "value" attribute of each html input.
         */
        $LivroCategoria = $LivroNome = $LivroAutor = $LivroPreco = NULL;
    }   
}

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

  <title>Cadastro de produtos</title>

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
                                        <h3 class="text-center font-weight-light my-4">Adicionar livro</h3>
                                        <div class="card-body">
                                        <form action="addProduct.php" method="post" enctype="multipart/form-data">
                                                <div class="form-floating mb-3">
                                                    <label for="nomelivro">Nome do livro:</label>
                                                    <input class="form-control" id="nome" type="text" name="nome"
                                                        placeholder="Insira o nome do livro" required value="<?php echo isset($LivroNome) ? $LivroNome : ''; ?>">
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <label for="categoria">Categoria:</label>
                                                    <input class="form-control" id="categoria" type="text" name="categoria"
                                                     placeholder="Insira a categoria do livro" value="<?php echo isset($LivroCategoria) ? $LivroCategoria : ''; ?>"/>
                                                    <label class="texto">Adicionar apenas categorias possiveis: autobiografia, ciencia, historia, biografia, aventura, fantasia, romance, infantil, suspense
                                                    </label> 
                                                <div class="form-floating mb-3">
                                                    <label for="preco">Autor:</label>
                                                 <input class="form-control" id="autor" type="text" name="autor"
                                                     placeholder="Insira o nome do autor" value="<?php echo isset($LivroAutor) ? $LivroAutor : ''; ?>"/>
                                                </div>   
                                                <div class="form-floating mb-3">
                                                    <label for="preco">Preço:</label>
                                                 <input class="form-control" id="preco" type="number" min="0" max="10000" step="any" name="preco"
                                                     placeholder="Insira o nome do autor" value="<?php echo isset($LivroPreco) ? $LivroPreco : ''; ?>"/>
                                                </div>      
                                                <div class="form-floating mb-3">
                                                    <label for="file">Images</label>
                                                    <input type="file" id="file" name="file[]" multiple>
                                                </div>  
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Adicionar livro</button></div>
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