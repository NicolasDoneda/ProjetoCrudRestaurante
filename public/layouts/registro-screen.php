<?php
require_once('/ProjetoCrudRestaurante/src/crud/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    // Validação básica
    if (empty($nome) || empty($email) || empty($senha)) {
        die("Todos os campos devem ser preenchidos.");
    }

    // Criptografa a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senhaHash, $tipo]);

        echo "Usuário registrado com sucesso!";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Erro: este e-mail já está cadastrado.";
        } else {
            echo "Erro ao registrar usuário: " . $e->getMessage();
        }
    }
}
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
    <div id = 'div-fundo'>
        <div class = 'div-content'>
            <div class = 'container-card-login'>

                <form method="POST">

                    <h1> Seja Bem vindo!</h1>
                    <div class = 'circulo'>
                        <p id = 'AL'>AL</p>
                        <p id = 'EZA'>&ZA</p>
                    </div>

                    <input type = "text" name = "nome" placeholder="Nome" required/> <br/>
                    <input type = "email" name = "email" placeholder="Email" required/> <br/>
                    <input type = "password" name = "senha" placeholder="Senha" required/> <br/>
                    <select name = "tipo">
                        <option value = "cliente">Cliente</option>
                        <option value = "admin">Administrador</option>
                    </select><br/>
                    <button type = "submit"> Registrar</button>
                </form>

            </div>

            <img src ='../Assets/images/images-login-register/gordo.png'>
            <div class = 'balao'> Olá, senti sua falta! </div>
        </div>
    </div>

</body> 
</html>