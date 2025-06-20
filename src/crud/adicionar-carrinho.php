<?php
    session_start();
    require_once("conexao.php");

    $id = $_GET["id"] ?? null;

    if(!$id){
        header("Location: /ProjetoCrudRestaurante/src/crud/erro.php");
        exit;
    }

    //Buscando os pratos no bd

    $sql = "SELECT * FROM pratos WHERE id = :id";
    $stmt= $pdo ->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt -> execute();
    $prato = $stmt -> fetch();

    if (!$prato){
        header('Location: /ProjetoCrudRestaurante/src/crud/erro.php');
        exit;
    }

    //Adicionando ao carrinho
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] =[];
    }

    if(isset($_SESSION['carrinho'][$id])){
        $_SESSION ['carrinho'][$id]['quantidade']++;
    }
    else{
        $_SESSION['carrinho'][$id] =[
        'id' => $prato['id'],
        'nome' => $prato['nome'],
        'preco' => $prato['preco'],
        'imagem' => $prato['imagem'],
        'quantidade' => 1,



        ];
    }

$_SESSION['mensagem_sucesso'] = "Item '{$prato['nome']}' adicionado ao carrinho!";

header('Location: /ProjetoCrudRestaurante/public/layouts/cardapio-screen.php');
exit;
?>