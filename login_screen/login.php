<?php
session_start();
require_once('../Assets/php/conexao.php'); // ajuste o caminho se necessário

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
        header("Location: ../admin_screen/admin.php");
        exit;
    }
    else{
        echo "Login inválido!";
    }
}
?>

