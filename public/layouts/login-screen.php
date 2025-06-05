<?php
session_start();
require_once(__DIR__ . '/../../src/crud/conexao.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = 'SELECT * FROM usuarios WHERE email = :email AND senha = :senha';
    $stmt = $pdo -> prepare ($sql);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':senha', $senha);
    $stmt -> execute();

    if($stmt -> rowCount() >0){
        $_SESSION['admin'] = true;
        header("Location: admin-screen.php");
        exit;
    }
    else{
        echo "Login inválido!";
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
</head>

<body>
    <h2>Login</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required /> <br />
        <input type="password" name="senha" placeholder="Senha" required /> <br />
        <button type="submit"> Entrar </button>
    </form>
    
    <!-- JS Global -->
    <script src="../../Assets/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>

