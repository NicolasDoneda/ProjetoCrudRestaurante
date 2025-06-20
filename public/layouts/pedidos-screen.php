<?php 
    session_start();

    $carrinho = $_SESSION['carrinho']??[];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $id = $_POST['id'];

        if ($_POST['acao'] === 'aumentar'){
            $carrinho[$id]['quantidade']++;
        }
        elseif($_POST['acao'] === 'diminuir'){
            $carrinho[$id]['quantidade']--;

            if($carrinho [$id]['quantidade'] <= 0){
                unset($carrinho[$id]);
            }
        }
        elseif($_POST['acao'] === 'remover'){
            unset( $carrinho[$id] );
        }

        $_SESSION['carrinho'] = $carrinho;
        header("Location: pedidos-screen.php");
        exit;
    }
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Seu Pedido</title>
    <link rel='stylesheet' href='../Assets/bootstrap/dist/css/bootstrap.min.css'>
</head>
<body class="p-5">
    <header>
    <?php include '../public/includes/header.php'; ?>
    </header>
    <h2>Seu Pedido</h2>

    <?php if (empty($carrinho)): ?>
        <p>Seu carrinho está vazio.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Prato</th>
                    <th>Imagem</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalGeral = 0; ?>
                <?php foreach ($carrinho as $item): ?>
                    <?php $total = $item['preco'] * $item['quantidade']; ?>
                    <?php $totalGeral += $total; ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nome']) ?></td>
                        <td><img src='/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($item['imagem']) ?>' width="80"></td>
                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                        <td><?= $item['quantidade'] ?></td>
                        <td>R$ <?= number_format($total, 2, ',', '.') ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button name="acao" value="aumentar" class="btn btn-success btn-sm">+</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button name="acao" value="diminuir" class="btn btn-warning btn-sm">-</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button name="acao" value="remover" class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"><strong>Total Geral:</strong></td>
                    <td><strong>R$ <?= number_format($totalGeral, 2, ',', '.') ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <button onclick="confirmarPedido()" class="btn btn-primary mt-3">Confirmar Pedido</button>
    <?php endif; ?>
<footer>
<?php include '../public/includes/footer.php'; ?>
</footer>
    <script>
        function confirmarPedido() {
            alert("Pedido confirmado! Obrigado.");
            window.location.href = '../../src/crud/limpar-carrinho.php';
        }
    </script>
</body>
</html>
<?php include(__DIR__ . '/../includes/footer.php')?>