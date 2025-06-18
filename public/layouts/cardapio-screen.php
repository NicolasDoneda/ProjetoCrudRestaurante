<?php 
require_once(__DIR__ . '/../../src/crud/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');

$mensagem_sucesso = '';
if (isset($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    unset($_SESSION['mensagem_sucesso']); // Limpa a mensagem após exibir
}


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

include(__DIR__ . '/../includes/header.php');
?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Painel Administrativo</title>
    <script>
        function confirmarExclusao() {
            return confirm('Tem certeza de que deseja excluir este prato?');
        }
    </script>
    <!----- CSS do Bootstrap -------> 
    <link rel='stylesheet' href='../Assets/bootstrap/dist/css/bootstrap.min.css'> 
    <link rel='stylesheet' href='../Assets/css/cardapio.css'> 
</head>

<body>

    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3 mx-auto" role="alert" style="max-width: 800px;">
            <?= htmlspecialchars($mensagem_sucesso) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>




    <!--- Parte do confira nosso cardapio ---->
    <div class='d-flex align-items-center flex-column mt-3'>
        <p id='bem-vindo'> Confira Nosso </p>
        <p id='cardapio'> Cardápio </p>
    </div>
    <!--- Bandeiras italia e arabia ---->
    <div class='d-flex align-items-center flex-row justify-content-center'>
        <div id='verde'></div>
        <div id='branco'></div>
        <div id='vermelho'></div>
    </div>
    <div class='d-flex align-items-center flex-row justify-content-center'>
        <div id='arabia'>
            <img id='img-espada' src='../Assets/images/images-cardapio/espada-arabia.png' alt='imagem carregada!'>
        </div>
    </div>

    <!-- FILTRO DE CATEGORIAS -->
     <div class = 'mt-2 d-flex justify-content-end w-100'>
    <form method="GET" class = 'm-3 d-flex align-items-center'>
        <select name="categoria" onchange="this.form.submit()" class = "m-3">
            <option value="">Todas as categorias</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $id_categoria_selecionada) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($categoria['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    </div>

    <!--- parte dos cards dos pratos ---->
    <div id='container-card'>
        <?php foreach ($pratos as $prato): ?>
            <a href="/ProjetoCrudRestaurante/src/crud/adicionar-carrinho.php?id=<?= $prato['id'] ?>" class="text-decoration-none text-dark">
            <div class='card-pratos'>
                <div class='container-img'>
                    <img class='img-pratos' src='/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>' alt='Imagem do prato'>
                </div>
                <h3 id='card-tittle'><?= htmlspecialchars($prato['nome']) ?></h3>
                <div id='line-img'></div>
                <div id='container-text-card'>
                    <p id='card-desc'><?= htmlspecialchars($prato['descricao']) ?></p>
                    <p style="font-size: 0.9vw; color: #555; margin-top: 0.5vw;">
                        Categoria: <?= htmlspecialchars($prato['categoria_nome']) ?>
                    </p>
                    <p id='preco-card'>R$ <?= htmlspecialchars($prato['preco']) ?></p>
                </div>
            </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!----- JS do Bootstrap ------->
    <script src='../Assets/bootstrap/dist/js/bootstrap.bundle.js'></script>
</body>

</html>
