<?php
require_once '../Assets/php/conexao.php';
require_once '../Assets/php/verifica.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    //Imagens

    $imagem = $_FILES['imagem']['name'];
    $caminho_imagem = '../Assets/imagem_pratos'. basename($imagem);

    if(move_uploaded_file($_FILES['imagem'] ['tmp_name'], $caminho_imagem)){

        $sql = "INSERT INTO pratos (nome, descricao, preco, imagem) VALUES (:nome, :descricao, :preco, :imagem)";
        $stmt = $pdo -> prepare ($sql);
        $stmt -> bindParam(':nome', $nome);
        $stmt -> bindParam(':descricao', $descricao);
        $stmt -> bindParam(':preco', $preco);
        $stmt -> bindParam(':imagem', $caminho_imagem);

        if ($stmt -> execute()){
            echo "Prato cadastrado com sucesso!";
        }
        else{
            echo "Erro ao cadastrar o filme."
        }

    }
    else {
        echo"Falha ao enviar a imagem.";
    }
}
?>

<form method = "POST" action = "create.php" enctype = "multipart/form-data">
    <label> Nome do prato: </label> <br>
    <input type = "text" name = "nome" required> <br> <br>
    
    <label> Descrição: </label> <br>
    <textarea type = "text" name = "descricao" required></textarea> <br> <br>

    <label> Preço: </label> <br>
    <input type = "number" name = "preco" required> <br> <br>

    <label> Imagem do filme: </label> <br>
    <input type = "file" name = "imagem" required> <br> <br>

    <buttom type = "submit"> Cadastrar prato </button>
</form>
