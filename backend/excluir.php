<?php
include_once('conecta.php');
$dados = $_GET;
$banco = new Banco;
$conn = $banco->conectar();

switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare('DELETE FROM vendas where id = :id');        
        $query->execute([
            ':id' => $dados['id'],
        ]);
        header('location:..\frontend\revenda.php');
        break;
    case 2:
        $query = $conn->prepare('DELETE FROM livros where id = :id');        
        $query->execute([
            ':id' => $dados['id'],
        ]);
        header('location:..\frontend\categories.php');
        break;
}