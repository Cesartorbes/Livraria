<?php
include 'config.php';
include 'connection.php';

$livroSaved = FALSE;

if (isset($_POST['submit'])) {
    /*
     * Read posted values.
     */
    $LivroCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $LivroNome = isset($_POST['nomelivro']) ? $_POST['nomelivro'] : '';
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
                    $uploadedFileName = basename($_FILES['file']['nome'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_nome'][$uploadedFileKey];

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
        $sql = 'INSERT INTO livros (
                    categoria,
                    nomelivro,
                    autor,
                    preco
                ) VALUES (
                    ?, ?, ?, ?
                )';

        /*
         * Prepare the SQL statement for execution - ONLY ONCE.
         * 
         * @link http://php.net/manual/en/mysqli.prepare.php
         */
        $statement = $connection->prepare($sql);

        /*
         * Bind variables for the parameter markers (?) in the 
         * SQL statement that was passed to prepare(). The first 
         * argument of bind_param() is a string that contains one 
         * or more characters which specify the types for the 
         * corresponding bind variables.
         * 
         * @link http://php.net/manual/en/mysqli-stmt.bind-param.php
         */
        $statement->bind_param('sis', $LivroCategoria ,$livroNome, $LivroAutor, $LivroPreco);

        /*
         * Execute the prepared SQL statement.
         * When executed any parameter markers which exist will 
         * automatically be replaced with the appropriate data.
         * 
         * @link http://php.net/manual/en/mysqli-stmt.execute.php
         */
        $statement->execute();

        // Read the id of the inserted product.
        $lastInsertId = $connection->insert_id;

        /*
         * Close the prepared statement. It also deallocates the statement handle.
         * If the statement has pending or unread results, it cancels them 
         * so that the next query can be executed.
         * 
         * @link http://php.net/manual/en/mysqli-stmt.close.php
         */
        $statement->close();

        /*
         * Save a record for each uploaded file.
         */
        foreach ($filenamesToSave as $filename) {
            $sql = 'INSERT INTO livros_images (
                        livro_id,
                        filename
                    ) VALUES (
                        ?, ?
                    )';

            $statement = $connection->prepare($sql);

            $statement->bind_param('is', $lastInsertId, $filename);

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
        $LivroCategoria = $LivroNome = $Livroautor = $LivroPreco = NULL;
    }   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <meta charset="UTF-8" />
        <!-- The above 3 meta tags must come first in the head -->

        <title>Save product details</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <style type="text/css">
            body {
                padding: 30px;
            }

            .form-container {
                margin-left: 80px;
            }

            .form-container .messages {
                margin-bottom: 15px;
            }

            .form-container input[type="text"],
            .form-container input[type="number"] {
                display: block;
                margin-bottom: 15px;
                width: 150px;
            }

            .form-container input[type="file"] {
                margin-bottom: 15px;
            }

            .form-container label {
                display: inline-block;
                float: left;
                width: 100px;
            }

            .form-container button {
                display: block;
                padding: 5px 10px;
                background-color: #8daf15;
                color: #fff;
                border: none;
            }

            .form-container .link-to-product-details {
                margin-top: 20px;
                display: inline-block;
            }
        </style>

    </head>
    <body>

        <div class="form-container">
            <h2>Adicione o livro</h2>

            <div class="messages">
                <?php
                if (isset($errors)) {
                    echo implode('<br/>', $errors);
                } elseif ($livroSaved) {
                    echo 'The product details were successfully saved.';
                }
                ?>
            </div>

            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <label for="categoria">Categoria</label>
                <input type="text" id="categoria" name="categoria" value="<?php echo isset($LivroCategoria) ? $LivroCategoria : ''; ?>">

                <label for="nome">Nome do livro</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($LivroNome) ? $LivroNome : ''; ?>">

                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" value="<?php echo isset($LivroAutor) ? $LivroAutor : ''; ?>">

                <label for="preco">Preco</label>
                <input type="number" min="0" max="10000" step="any" id="preco" name="preco" value="<?php echo isset($LivroPreco) ? $LivroPreco : ''; ?>">

                <label for="file">Images</label>
                <input type="file" id="file" name="file[]" multiple>

                <button type="submit" id="submit" name="submit" class="button">
                    Submit
                </button>
            </form>

            <?php
            if ($livroSaved) {
                ?>
                <a href="getProduct.php?id=<?php echo $lastInsertId; ?>" class="link-to-product-details">
                    Click me to see the saved product details in <b>getProduct.php</b> (livro id: <b><?php echo $lastInsertId; ?></b>)
                </a>
                <?php
            }
            ?>
        </div>

    </body>
</html>