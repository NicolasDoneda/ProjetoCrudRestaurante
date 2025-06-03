<?php
require_once('../Assets/php/conexao.php'); // ajuste o caminho se necessário

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$tipo = $_POST['tipo']; // 'cliente' ou 'adm'

$sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nome, $email, $senha, $tipo]);

echo "Usuário registrado com sucesso!";
?>