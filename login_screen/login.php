<?php
require_once('../Assets/php/conexao.php'); // ajuste o caminho se necessário

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($senha, $usuario['senha'])) {
    echo "Bem-vindo, " . $usuario['nome'] . "! Você é um " . $usuario['tipo'];
    // Aqui você pode iniciar sessão com session_start() se quiser
} else {
    echo "Email ou senha incorretos!";
}
?>
