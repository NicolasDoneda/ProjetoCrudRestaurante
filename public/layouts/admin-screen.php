<?php

require_once(__DIR__ . '/../../src/crud/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');


$sql = "SELECT * FROM  pratos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pratos = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <script>
        function confirmarExclusao() {
            return confirm("Tem certeza de que deseja excluir este prato?");
        }
    </script>
    <!----- CSS do Bootstrap ------->
    <link rel="stylesheet" href="../Assets/bootstrap/dist/css/bootstrap.min.css"> 
</head>

<body>
    <nav style = "background-color: #7D0823">
    <div class="d-flex justify-content-center align-items-center ">
        <h1 class = "text-center text-white" > Área Administrativa - Pratos </h1>
    </div>
    <div class =" d-flex justify-content-start">
                <a class = "btn m-3" style ="background-color: #3A6B35; color: #adeba7" href= "/ProjetoCrudRestaurante/src/crud/create.php"> Cadastrar novo prato </a>  <a class = "btn m-3" style ="background-color: #3A6B35; color: #adeba7"  href="/ProjetoCrudRestaurante/src/crud/logout.php"> Sair </a>
    </div>
    </nav>
    

    <?php 
    foreach ($pratos as $prato): ?>
        <div class = 'container'>
            <h3> <?php echo htmlspecialchars($prato['nome']); ?> </h3>
            <p> <strong> Descrição:</strong> <?php echo htmlspecialchars($prato['descricao']); ?> </p>
            <p> <strong> Preço: </strong> <?php echo htmlspecialchars($prato['preco']); ?> </p>
            <img src="/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>" alt="Imagem do prato" width="200">


 

            <!-- Links do delete e do edit -->
            <br> <br>
            <a  class="btn btn-primary" href="/ProjetoCrudRestaurante/src/crud/edit.php?id=<?php echo $prato['id']; ?>"> Editar </a>
            <a class = "btn btn-primary" href="/ProjetoCrudRestaurante/src/crud/delete.php?id=<?php echo $prato['id']; ?>" onclick="return confirmarExclusao();">Deletar</a>
        </div>
        
    <?php endforeach; ?>
        <!----- JS do Bootstrap ------->
    <script src="../../Assets/bootstrap/dist/js/bootstrap.bunde.js"></script>
</body>

</html>