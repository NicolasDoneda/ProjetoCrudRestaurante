<?php
session_start();
define('BASE_PATH', dirname(__DIR__, 3));
require_once(BASE_PATH . '/src/conexao.php'); // ajuste o caminho se necessário

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

