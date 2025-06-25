<?php
require_once(__DIR__ . '/../../src/crud/conexao.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    $tipo = 'cliente';

    if (empty($nome) || empty($email) || empty($senha)) {
        $mensagem = "Todos os campos devem ser preenchidos.";
    } else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $email, $senhaHash, $tipo]);

            $mensagem = "Usuário registrado com sucesso!";
            $nome = $email = '';
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $mensagem = "Erro: este e-mail já está cadastrado.";
            } else {
                $mensagem = "Erro ao registrar usuário.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro - Al Dente & Za’atar</title>
    <link rel="stylesheet" href="../Assets/css/headerFooterStyle.css" />
    <link rel="stylesheet" href="../Assets/css/registerStyle.css" />
</head>

<body>

    <main>
        <section id="secao-content">
            <div class="div-content">
                <div class="container-card-registro">
                    <form method="POST" novalidate>
                        <h1>Seja Bem-vindo!</h1>
                        <div class="circulo">
                            <p id="AL">AL</p>
                            <p id="EZA">&ZA</p>
                        </div>

                        <input
                            type="text"
                            name="nome"
                            placeholder="Nome"
                            required
                            value="<?= htmlspecialchars($nome ?? '') ?>"
                        />
                        <br />

                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required
                            value="<?= htmlspecialchars($email ?? '') ?>"
                        />
                        <br />

                        <input
                            type="password"
                            name="senha"
                            placeholder="Senha"
                            required
                        />
                        <br />

                        <input type ="hidden" name = "tipo" value = "cliente"/>
                        <br />

                        <?php if (!empty($mensagem)) : ?>
                            <div class="mensagem-login">
                                <?= $mensagem ?>
                            </div>
                        <?php endif; ?>

                        <button type="submit">Registrar</button>
                    </form>
                </div>

                <img src="../Assets/images/images-login-register/gordo.png" alt="Mascote Al Dente & Za’atar" />
                <div class="balao">É sua primeira vez aqui?</div>
            </div>
        </section>
    </main>


</body>

</html>
