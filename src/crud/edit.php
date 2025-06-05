<?php
require_once('conexao.php');
require_once('verifica.php');

if (!isset($_GET['id'])) {
    echo "ID não especificado.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM pratos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$prato = $stmt->fetch();

if (!$prato) {
    echo "Prato não encontrado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Verifica se uma nova imagem foi enviada
    if (!empty($_FILES['imagem']['name'])) {
        $nomeImagem = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $caminhoServidor = __DIR__ . '/../../Assets/imagem_pratos/' . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoServidor)) {
            $caminho_imagem = $nomeImagem;
        } else {
            echo "Erro ao enviar nova imagem.";
            exit;
        }
    } else {
        $caminho_imagem = $prato['imagem']; // mantém imagem atual
    }

    // Atualizar no banco
    $sql = "UPDATE pratos SET nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':imagem', $caminho_imagem);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Prato atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o prato.";
    }
}
?>

<h1>Editar Prato</h1>
<form method="POST" action="edit.php?id=<?= $prato['id'] ?>" enctype="multipart/form-data">
    <label>Nome do prato:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($prato['nome']) ?>" required><br><br>

    <label>Descrição:</label><br>
    <input type="text" name="descricao" value="<?= htmlspecialchars($prato['descricao']) ?>" required><br><br>

    <label>Preço:</label><br>
    <input type="number" name="preco" step="0.01" value="<?= htmlspecialchars($prato['preco']) ?>" required><br><br>

    <label>Imagem do prato:</label><br>
    <input type="file" name="imagem"><br><br>

    <button type="submit">Salvar alterações</button>
</form>
