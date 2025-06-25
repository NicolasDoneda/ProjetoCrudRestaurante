<?php
session_start();
require_once(__DIR__ . '/../../src/crud/conexao.php');

$erroLogin = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    $sql = 'SELECT * FROM usuario WHERE email =     :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['admin'] = ($usuario['tipo'] === 'admin');
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];

        if($_SESSION['admin']){
            header("Location: /ProjetoCrudRestaurante/public/layouts/admin-screen.php");
            exit;
        }
        else{
            header("Location: /ProjetoCrudRestaurante/public/index.php");
            exit;
        }


    } 
    
    else {
        $erroLogin = 'Email ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Al Dente & Za’atar</title>

    <link rel="stylesheet" href="../../public/Assets/css/loginStyle.css" />
    <link rel="stylesheet" href="../Assets/css/headerFooterStyle.css" />
</head>

<body>

    <main>
        <section id="secao-content">
            <div class="div-content">
                <div class="container-card-login">
                    <form method="POST">
                        <h1>Seja Bem vindo!</h1>
                        <div class="circulo">
                            <p id="AL">AL</p>
                            <p id="EZA">&ZA</p>
                        </div>

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

                        <?php if (!empty($erroLogin)) : ?>
                            <div class="erro-login"><?= $erroLogin ?></div>
                        <?php endif; ?>

                        <button type="submit">Entrar</button>

                        <a href="./registro-screen.php" class="registro-usuario">
                            Não possui conta? Registre-se
                        </a>
                    </form>
                </div>

                <img
                    src="../Assets/images/images-login-register/gordo.png"
                    alt="Imagem decorativa"
                />
                <div class="balao">Olá, senti sua falta!</div>
            </div>
        </section>
    </main>



    <script src="../../Assets/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>
