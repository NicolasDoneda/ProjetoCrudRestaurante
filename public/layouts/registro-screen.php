<?php
require_once('../Assets/php/conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$tipo = $_POST['tipo']; // 'cliente' ou 'adm'

$sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nome, $email, $senha, $tipo]);

echo "Usuário registrado com sucesso!";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel = "stylesheet" href ="../Assets/css/register&loginStyle.css">
</head>
<body>
    <h2>Registro</h2>
    <form action = "registro.php" method="POST">
        <input type = "text" name = "nome" placeholder="Nome" required/> <br/>
        <input type = "email" name = "email" placeholder="Email" required/> <br/>
        <input type = "password" name = "senha" placeholder="Senha" required/> <br/>
        <select name = "tipo">
            <option value = "cliente">Cliente</option>
            <option value = "admin">Administrador</option>
        </select><br/>
        <button type = "submit"> Registrar</button>
    </form>
</body> 
</html>