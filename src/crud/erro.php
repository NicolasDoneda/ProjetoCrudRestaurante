<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Erro</title>
    <link rel="stylesheet" href="../Assets/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8d7da;
            color: #721c24;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .erro-container {
            background-color: #f5c6cb;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="erro-container">
        <h1>Ops! Algo deu errado.</h1>
        <p>O prato solicitado não foi encontrado ou ocorreu um erro no processo.</p>
        <a href="javascript:history.back()" class="btn btn-secondary mt-3">Voltar</a>
        <a href="index.php" class="btn btn-primary mt-3">Ir para o início</a>
    </div>
</body>
</html>