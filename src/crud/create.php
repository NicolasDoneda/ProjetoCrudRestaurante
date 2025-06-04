<?php
require_once(__DIR__ . '/../../src/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //pega os dados inseridos no formulário da linha 35 em diante,
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $imagem = uniqid() . '_' .  basename ($_FILES['imagem']['name']);
    $caminho_servidor = __DIR__ . '/../../Assets/imagem_pratos/' . $imagem;
    $caminho_imagem = $imagem; // apenas o nome será salvo no banco

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_servidor)) {
        $sql = "INSERT INTO pratos (nome, descricao, preco, imagem) VALUES (:nome, :descricao, :preco, :imagem)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':imagem', $caminho_imagem);

        if ($stmt->execute()) {
            echo "Prato cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o prato.";
        }
    } else {
        echo "Falha ao enviar a imagem.";
    }
}
?>

<form method="POST" action="create.php" enctype="multipart/form-data">
    <label> Nome do prato: </label> <br>
    <input type="text" name="nome" required> <br> <br>
    
    <label> Descrição: </label> <br>
    <textarea name="descricao" required></textarea> <br> <br>

    <label> Preço: </label> <br>
    <input type="number" name="preco" required step="0.01"> <br> <br>

    <label> Imagem do prato: </label> <br>
    <input type="file" name="imagem" required> <br> <br>

    <button type="submit"> Cadastrar prato </button>
</form>
