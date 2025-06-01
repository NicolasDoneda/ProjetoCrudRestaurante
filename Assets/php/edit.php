<?php
require 'conexao.php';
require 'verifica.php';

if (isset ($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM pratos WHERE id = :id";
    $stmt = $pdo -> prepare ($sql);
    $stmt -> bindParam (':id', $id);
    $stmt -> execute():
    $prato = $stmt -> fetch();

    if (!$prato){
        echo "Prato não encontrado.";
        exit;

    }
}
else {
    echo "ID não especificado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $POST['preco'];
    
    //vai verificar se uma nova imagem vai ser carregada

    if($_FILES['imagem']['name']){
       $imagem = $_FILES['imagem']['name'];
       $caminho_imagem = '../Assets/imagem_pratos/'. basename($imagem);
       move_uploaded_file($_FILES ['imagem']['tmp_name'], $caminho_imagem);
    }
    else{
        $caminho_imagem = $filme['imagem'],

    }

    //Atualizar no banco

    $sql = "UPDATE filmes SET nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem WHERE id = :id";
    $stmt = $pdo -> prepare ($sql);
    $stmt -> bindParam(':nome', $nome);
    $stmt -> bindParam(':descricao', $descricao);
    $stmt -> bindParam(':preco', $preco);
    $stmt -> bindParam(':imagem', $imagem);
    $stmt -> bindParam (':id', $id);

    if ($stmt -> execute()){
        echo "Prato atualizado com sucesso!";
    }
    else{
        echo "Erro ao atualizar o prato.";
    }

}
?>

<form method = "POST" action = "edit.php?id = <?php echo $prato['id']; ?>" enctype = "multipart/form-data">
    <label> Nome do prato: </label> <br>
    <input type = "text" name = "nome" value = "<?php echo htmlspecialchars($filme ['nome']); ?>" required> <br><br>

    <label> Descrição: </label> <br>
    <input type = "text" name = "descricao" value = "<?php echo htmlspecialchars($filme ['descricao']); ?>" required> <br><br>
    
    <label> Preço: </label> <br>
    <input type = "number" name = "preco" value = "<?php echo htmlspecialchars($filme ['preco']); ?>" required> <br><br>
    
    <label> Imagem do prato: </label> <br>
    <input type = "file" name = "imagem"> <br><br>

    <button type = "submit"> Salvar alterações </button>
</form>