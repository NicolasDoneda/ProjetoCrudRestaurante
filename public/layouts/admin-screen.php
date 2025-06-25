<?php

require_once(__DIR__ . '/../../src/crud/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');


$sql = "SELECT * FROM  pratos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pratos = $stmt->fetchAll();

// Buscar categorias para o filtro
$sqlCategorias = "SELECT * FROM categoria";
$stmtCategorias = $pdo->prepare($sqlCategorias);
$stmtCategorias->execute();
$categorias = $stmtCategorias->fetchAll();

// Pegar categoria selecionada no filtro
$id_categoria_selecionada = $_GET['categoria'] ?? '';

// Montar consulta de pratos com filtro
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
    <link rel = "stylesheet" href = "../Assets/css/adminStyle.css">
    <link rel = "stylesheet" href = "../Assets/css/headerFooterStyle.css">
</head>
<body>
      <div class="filtro-categorias mt-4 d-flex justify-content-end w-100 pe-5">
            <form method="GET" class="filtro-form d-flex align-items-center">
                <select name="categoria" onchange="this.form.submit()" class="form-select filtro-select">
                    <option value="">Todas as categorias</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $id_categoria_selecionada) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categoria['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
    <main class="container-main">
        <h1 class="titulo-principal">Área Administrativa - Pratos</h1>
        <a href="/ProjetoCrudRestaurante/src/crud/create.php" class="link-topo">Cadastrar novo prato</a> | 
        <a href="/ProjetoCrudRestaurante/src/crud/logout.php" class="link-topo">Sair</a>
        <hr class="linha-separadora">

        <?php foreach ($pratos as $prato): ?>
            <div class="card-prato">
                <h3 class="titulo-prato"><?php echo htmlspecialchars($prato['nome']); ?></h3>
                <p class="descricao-prato"><strong class="texto-negrito">Descrição:</strong> <?php echo htmlspecialchars($prato['descricao']); ?></p>
                <p class="descricao-prato"><strong class="texto-negrito">Preço:</strong> <?php echo htmlspecialchars($prato['preco']); ?></p>
                <img src="/ProjetoCrudRestaurante/public/Assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>" alt="Imagem do prato" class="img-prato">

                <div class="links-editar-deletar">
                    <a href="/ProjetoCrudRestaurante/src/crud/edit.php?id=<?php echo $prato['id']; ?>">Editar</a> |
                    <a href="/ProjetoCrudRestaurante/src/crud/delete.php?id=<?php echo $prato['id']; ?>" onclick="return confirmarExclusao();">Deletar</a>
                </div>
            </div>
            <hr class="linha-separadora">
        <?php endforeach; ?>
    </main>
    <footer>
        <?php include(__DIR__ . '/../includes/footer.php'); ?>
    </footer>
</body>
</html>