<?php
require_once(__DIR__ . '/../../src/crud/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');

// Buscar categorias para o filtro
$sqlCategorias = "SELECT * FROM categoria";
$stmtCategorias = $pdo->prepare($sqlCategorias);
$stmtCategorias->execute();
$categorias = $stmtCategorias->fetchAll();

// Pegar categoria selecionada via GET
$id_categoria_selecionada = $_GET['categoria'] ?? '';

// Buscar pratos com ou sem filtro
$sql = "SELECT p.*, c.nome AS categoria_nome 
        FROM pratos p 
        JOIN categoria c ON p.id_categoria = c.id";

if ($id_categoria_selecionada) {
    $sql .= " WHERE p.id_categoria = :id_categoria";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_categoria', $id_categoria_selecionada, PDO::PARAM_INT);
} else {
    $stmt = $pdo->prepare($sql);
}

$stmt->execute();
$pratos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <script>
        function confirmarExclusao() {
            return confirm("Tem certeza de que deseja excluir este prato?");
        }
    </script>
    <link rel="stylesheet" href="../Assets/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<nav style="background-color: #7D0823">
    <div class="d-flex justify-content-center align-items-center ">
        <h1 class="text-center text-white">Área Administrativa - Pratos</h1>
    </div>
    <div class="d-flex justify-content-start">
        <a class="btn m-3" style="background-color: #3A6B35; color: #adeba7" href="/ProjetoCrudRestaurante/src/crud/create.php">Cadastrar novo prato</a>
        <a class="btn m-3" style="background-color: #3A6B35; color: #adeba7" href="/ProjetoCrudRestaurante/src/crud/logout.php">Sair</a>
    </div>
</nav>

<!-- Formulário filtro -->
<form method="GET">
    <label for="categoria" class = 'color:white'>Filtrar ategoria:</label>
    <select name="categoria" id="categoria" onchange="this.form.submit()">
        <option value="">Todas as categorias</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $id_categoria_selecionada) ? 'selected' : '' ?>>
                <?= htmlspecialchars($categoria['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>



<!-- pratos -->
<?php foreach ($pratos as $prato): ?>
    <div class='container my-3 p-3 border'>
        <h3><?= htmlspecialchars($prato['nome']) ?></h3>
        <p><strong>Categoria:</strong> <?= htmlspecialchars($prato['categoria_nome']) ?></p>
        <p><strong>Descrição:</strong> <?= htmlspecialchars($prato['descricao']) ?></p>
        <p><strong>Preço:</strong> R$ <?= htmlspecialchars($prato['preco']) ?></p>
        <img src="/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>" alt="Imagem do prato" width="200">

        <br><br>
        <a class="btn btn-primary" href="/ProjetoCrudRestaurante/src/crud/edit.php?id=<?= $prato['id'] ?>">Editar</a>
        <a class="btn btn-danger" href="/ProjetoCrudRestaurante/src/crud/delete.php?id=<?= $prato['id'] ?>" onclick="return confirmarExclusao();">Deletar</a>
    </div>
<?php endforeach; ?>

<script src="../../Assets/bootstrap/dist/js/bootstrap.bunde.js"></script>
</body>
</html>
