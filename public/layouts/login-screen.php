<?php
session_start();
require_once(__DIR__ . '/../../src/crud/conexao.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = 'SELECT * FROM usuario WHERE email = :email';
    $stmt = $pdo -> prepare ($sql);
    $stmt -> bindParam(':email', $email);
    $stmt -> execute();

    $usuario = $stmt -> fetch();

    if($usuario && password_verify($senha, $usuario['senha'])){
        $_SESSION['admin'] = $usuario['tipo'] === 'admin';
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: admin-screen.php");
        exit;

    }
    else{
        echo"Email ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS Global -->
    <link rel="stylesheet" href="../../Assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/Assets/css/register&loginStyle.css">
</head>

<body>
    <div id="div-fundo">
        <div class = 'div-content'>

            <div class = 'container-card-login'>
                
                <form method="POST">
                    <h1> Seja Bem vindo!</h1>
                    <div class = 'circulo'>
                        <p id = 'AL'>AL</p>
                        <p id = 'EZA'>&ZA</p>
                    </div>
                    <input type="email" name="email" placeholder="Email" required /> <br />
                    <input type="password" name="senha" placeholder="Senha" required /> <br />
                    <button type="submit"> Entrar </button>
                </form>
                
                <!-- JS Global -->
                <script src="../../Assets/bootstrap/dist/js/bootstrap.bundle.js"></script>
                
                
            </div>


            <img src ='../Assets/images/images-login-register/gordo.png'>
            <div class = 'balao'> Olá, senti sua falta! </div>
        </div>
    </div>
</body>

</html>

