<?php
require_once('conexao.php');
require_once('verifica.php');

// Pega as categorias para popular o select no form
$sqlCategorias = "SELECT * FROM categoria";
$stmtCategorias = $pdo->prepare($sqlCategorias);
$stmtCategorias->execute();
$categorias = $stmtCategorias->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $id_categoria = $_POST['id_categoria'];  // novo campo

    $imagem = uniqid() . '_' . basename($_FILES['imagem']['name']);
    $caminho_servidor = __DIR__ . '/../../Assets/imagem_pratos/' . $imagem;
    $caminho_imagem = $imagem;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_servidor)) {
        $sql = "INSERT INTO pratos (nome, descricao, preco, imagem, id_categoria) VALUES (:nome, :descricao, :preco, :imagem, :id_categoria)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':imagem', $caminho_imagem);
        $stmt->bindParam(':id_categoria', $id_categoria);

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
    <label>Nome do prato:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br><br>

    <label>Preço:</label><br>
    <input type="number" name="preco" required step="0.01"><br><br>

    <label>Imagem do prato:</label><br>
    <input type="file" name="imagem" required><br><br>

    <label>Categoria:</label><br>
    <select name="id_categoria" required>
        <option value="">Selecione a categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>"><?= htmlspecialchars($categoria['nome']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Cadastrar prato</button>
</form>
