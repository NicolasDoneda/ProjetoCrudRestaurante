<?php

require_once(__DIR__ . '/../../src/crud/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');


$sql = "SELECT * FROM  pratos";
$stmt = $pdo->prepare($sql);
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
    <link rel = "stylesheet" href = "../assets/css/adminStyle.css">
    <link rel = "stylesheet" href = "../assets/css/headerFooterStyle.css">
</head>
<body>
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
                <img src="/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>" alt="Imagem do prato" class="img-prato">

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