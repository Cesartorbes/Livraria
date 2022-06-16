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
    // ingrediente
    case 1:
        $query = $conn->prepare('SELECT * FROM categorias WHERE categoria = :categoria AND nomelivro = :nomelivro');
        $query->execute([
            ':nomelivro' => $dados['nomelivro'],         
            ':categoria' => $dados['categoria']           
        ]);
        // Se houver um ingrediente com esse nome no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO :categorais (categoria, nomelivro, autor, preco) VALUES (:categoria, :nomelivro, :autor, :preco);');
            $query->execute([
                ':categoria' => $dados['categoria'],
                ':nomelivro' => $dados['nomelivro'],
                ':autor' => $dados['autor'],
                ':preco' => $dados['preco']
            ]);
            header('location:..\frontend\system\add-ingrediente.php');
        } else{
            // Por enquanto só morre, depois mostrar de forma mais amigável para o usuário
            die('Já existe um ingrediente com o mesmo nome cadastrado');
        }
        break;
        
}

function pegaUltimoId($conexao){
    $query = $conexao->prepare("SELECT LAST_INSERT_ID()");
    $query->execute();
    return $query->fetch(PDO::FETCH_NUM);
}


?>