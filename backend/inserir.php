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
        $query = $conn->prepare('SELECT * FROM categorias WHERE categoria = :categoria AND nomelivro = :nomelivro');
        $query->execute([
            ':nomelivro' => $dados['nomelivro'],         
            ':categoria' => $dados['categoria']           
        ]);
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO categorias (nomelivro, categoria, autor, preco) VALUES (:nomelivro, :categoria, :autor, :preco);');
            $query->execute([
                ':nomelivro' => $dados['nomelivro'],
                ':categoria' => $dados['categoria'],             
                ':autor' => $dados['autor'],
                ':preco' => $dados['preco']
            ]);
            header('location:..\frontend\adicionar.php');
        } else{
            die('Já existe um livro com o mesmo nome cadastrado');
        }
        break;

    case 2:
        if($dados['senha'] == $dados['confirmpassword']){
            $query = $conn->prepare('SELECT * FROM usuario WHERE email = :email');
            $query->execute([
                ':email' => $dados['email']           
            ]);
            // Se houver um item com esse nome no banco, ele não insere
            if($query->fetch(PDO::FETCH_ASSOC) == null){
                $query = $conn->prepare('INSERT INTO usuario (nome, senha, email) VALUES (:nome, :senha, :email);');
            $query->execute([
                ':nome' => $dados['nome'],
                ':senha' => $dados['senha'],
                ':email' => $dados['email']
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
                die('Já existe um usuário com o mesmo email cadastrado');
            }
            break;
        } else{
            die("<script>alert('As senhas nâo coincidem');</script>");
        }
                
    
}


function pegaUltimoId($conexao){
    $query = $conexao->prepare("SELECT LAST_INSERT_ID()");
    $query->execute();
    return $query->fetch(PDO::FETCH_NUM);
}


?>