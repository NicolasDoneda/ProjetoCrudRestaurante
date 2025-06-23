<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login-screen.php");
    exit;
}



$carrinho = $_SESSION['carrinho'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if ($_POST['acao'] === 'aumentar') {
        $carrinho[$id]['quantidade']++;
    } elseif ($_POST['acao'] === 'diminuir') {
        $carrinho[$id]['quantidade']--;
        if ($carrinho[$id]['quantidade'] <= 0) {
            unset($carrinho[$id]);
        }
    } elseif ($_POST['acao'] === 'remover') {
        unset($carrinho[$id]);
    }

    $_SESSION['carrinho'] = $carrinho;
    header("Location: pedidos-screen.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Seu Pedido - Al Dente & Za’atar</title>
    <link rel="stylesheet" href="../assets/css/pedidosStyle.css">
</head>

<body>
    <header>
        <?php include(__DIR__ . '/../includes/header.php'); ?>
    </header>

    <main>
        <section class="pedidos-content">
            <h2 class="tituloSecundario">Carrinho de compras</h2>

            <?php if (empty($carrinho)): ?>
                <p style="text-align: center;">Seu carrinho está vazio.</p>
            <?php else: ?>
                <?php $totalGeral = 0; ?>
                <div class="carrinho-conteudo">
                    <div class="lista-itens">
                        <?php foreach ($carrinho as $item): ?>
                            <?php $total = $item['preco'] * $item['quantidade']; ?>
                            <?php $totalGeral += $total; ?>

                            <div class="item-carrinho">
                                <img src="/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($item['imagem']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>">
                                <div class="info-prato">
                                    <h3 class="nome-prato"><?= htmlspecialchars($item['nome']) ?></h3>
                                    <div class="controle-quantidade">
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <button name="acao" value="diminuir" class="btn-controle">-</button>
                                        </form>
                                        <span class="quantidade"><?= str_pad($item['quantidade'], 2, '0', STR_PAD_LEFT) ?></span>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <button name="acao" value="aumentar" class="btn-controle">+</button>
                                        </form>
                                    </div>
                                    <p class="preco">R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="box-subtotal">
                        <p class="resumo">Subtotal (<?= count($carrinho) ?> produto<?= count($carrinho) > 1 ? 's' : '' ?>):<br><strong>R$ <?= number_format($totalGeral, 2, ',', '.') ?></strong></p>
                        <button onclick="confirmarPedido()" class="botao-fechar">Fechar pedido</button>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <script>
        function confirmarPedido() {
            alert("Pedido confirmado! Obrigado.");
            window.location.href = '../../src/crud/limpar-carrinho.php';
        }
    </script>
    <footer>
        <?php include(__DIR__ . '/../includes/footer.php'); ?>
    </footer>
</body>

</html>