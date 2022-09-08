<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
try{
    $conn = $banco->conectar();
} catch(PDOException $e){
    echo 'Falha ao salvar os arquivos. Favor, tente mais tarde.';
}

switch ($dados['registro']) {
    case 1:
        if($dados['senha'] == $dados['confirmpassword']){
            $query = $conn->prepare('SELECT * FROM usuario WHERE email = :email');
            $query->execute([
                ':email' => $dados['email']           
            ]);
            // Se houver um item com esse nome no banco, ele não insere
            if($query->fetch(PDO::FETCH_ASSOC) == null){
                $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, cidade, telefone, numero) VALUES (:nome, :senha, :email, :cidade, :telefone, :numero);');
            $query->execute([
                ':nome' => $dados['nome'],
                ':senha' => $dados['senha'],
                ':email' => $dados['email'],
                ':cidade' => $dados['cidade'],
                ':telefone' => $dados['telefone'],
                ':numero' => $dados['numero'],
            ]);
            echo "<html>
                    <body>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
 
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Parabéns',
                            text: 'Seu cadastro foi realizado com sucesso!'
                        }).then(function() {
                            window.location = '../frontend/usuarios.php';
                        });
                    </script></body></html>";
            
            } else{
                echo "<html>
                    <body>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
 
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'E-mail ja cadastrado.'
                        }).then(function() {
                            window.location = '../frontend/usuarios.php';
                        });
                    </script></body></html>";
            }
            break;
        } else{
            echo "<html>
                    <body>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
 
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'As senhas não coicidem.'
                        }).then(function() {
                            window.location = '../frontend/usuarios.php';
                        });
                    </script></body></html>";
        }

    case 2:
        if($dados['senha'] == $dados['confirmpassword']){
            $query = $conn->prepare('SELECT * FROM usuario WHERE email = :email');
            $query->execute([
                ':email' => $dados['email']           
            ]);
            // Se houver um item com esse nome no banco, ele não insere
            if($query->fetch(PDO::FETCH_ASSOC) == null){
                $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, cidade, telefone) VALUES (:nome, :senha, :email, :cidade, :telefone);');
            $query->execute([
                ':nome' => $dados['nome'],
                ':senha' => $dados['senha'],
                ':email' => $dados['email'],
                ':cidade' => $dados['cidade'],
                ':telefone' => $dados['telefone'],
            ]);
            echo "<html>
                    <body>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
 
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Parabéns',
                            text: 'Seu cadastro foi realizado com sucesso!'
                        }).then(function() {
                            window.location = '../frontend/entrar.php';
                        });
                    </script></body></html>";
            
            } else{
                echo "<html>
                    <body>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
 
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'E-mail ja cadastrado.'
                        }).then(function() {
                            window.location = '../frontend/cadastrar.php';
                        });
                    </script></body></html>";
            }
            break;
        } else{
            echo "<html>
                    <body>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
 
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'As senhas não coicidem.'
                        }).then(function() {
                            window.location = '../frontend/cadastrar.php';
                        });
                    </script></body></html>";
        }
                
    
}


function pegaUltimoId($conexao){
    $query = $conexao->prepare("SELECT LAST_INSERT_ID()");
    $query->execute();
    return $query->fetch(PDO::FETCH_NUM);
}


?>