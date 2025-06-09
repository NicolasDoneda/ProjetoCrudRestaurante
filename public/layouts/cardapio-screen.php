<?php require_once(__DIR__ . '/../../src/crud/conexao.php');
require_once(__DIR__ . '/../../src/crud/verifica.php');

<<<<<<< HEAD
$sql = 'SELECT * FROM  pratos';
=======
$sql = "SELECT * FROM  pratos";
>>>>>>> 0857ba378b455b9d6f99a1e614ae0ae16ff019b1
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pratos = $stmt->fetchAll();

include(__DIR__ . '/../includes/header.php');
?>


<!DOCTYPE html>
<html lang='pt-br'>

<head>
<<<<<<< HEAD
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Painel Administrativo</title>
    <script>
        function confirmarExclusao() {
            return confirm('Tem certeza de que deseja excluir este prato?');
        }
    </script>
    <!----- CSS do Bootstrap ------->
    <link rel='stylesheet' href='../Assets/bootstrap/dist/css/bootstrap.min.css'> 
    <link rel='stylesheet' href='../Assets/css/cardapio.css'> 
</head>

<body  style = 'background-color: #E3DBCC'>

    <!--- Parte do confira nosso cardapio ---->
    <div class = 'd-flex align-items-center flex-column mt-3'>
        <p id= 'bem-vindo' class = 'fs-2  lh-1 mb-0 mt-1' style ='color: #3A6B35'> Confira Nosso </p>
        <p id = 'cardapio' class ='fs-1 lh-1' style = 'color: #892232' > Cardápio </p>
    </div>
    <!--- Bandeiras italia e arabia ---->
    <div class = 'd-flex align-items-center flex-row justify-content-center' >
        <div id ='verde'></div>
        <div id ='branco'></div>
        <div id ='vermelho'></div>
    </div>
    <div class = 'd-flex align-items-center flex-row justify-content-center' >
        <div id = 'arabia'>
            <img id = 'img-espada' src ='../Assets/images/images-cardapio/espada-arabia.png' alt ='imagem carregada!'>
        </div>
    </div>

    <!--- parte dos cards dos pratos ---->
    <div id = 'container-card'>
    <?php 
    foreach ($pratos as $prato): ?>
            <div class = 'card-pratos'>
                <div class = 'container-img'>
                <img class = 'img-pratos'src='/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>' alt='Imagem do prato' >
                </div>
                <div class ='card-body'>
                        <h3 id = 'card-tittle'> <?php echo htmlspecialchars($prato['nome']); ?> </h3>
                        <div id = 'line-img'></div>
                        <div id ='container-text-card'>
                        <p id ='card-desc'><?php echo htmlspecialchars($prato['descricao']); ?> </p>
                        <p class = 'card-text'> R$  <?php echo htmlspecialchars($prato['preco']); ?> </p>
                        </div>
                </div>
            </div>
            
    <?php endforeach; ?>
    </div>
        <!----- JS do Bootstrap ------->
    <script src='../../Assets/bootstrap/dist/js/bootstrap.bunde.js'></script>
=======
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

<body  style = "background-color: #E3DBCC">

    <!--- Parte do confira nosso cardapio ---->
    <div class = "d-flex align-items-center flex-column mt-3">
        <p id= "bem-vindo" class = "fs-2  lh-1 mb-0 mt-1" style ="color: #3A6B35"> Confira Nosso </p>
        <p id = "cardapio" class ="fs-1 lh-1" style = "color: #892232" > Cardápio </p>
    </div>
    <!--- Bandeiras italia e arabia seila ---->
    <div class = "d-flex align-items-center flex-row justify-content-center" >
        <div class ="w-25 h-25" style = "backgroud-color: #3A6B35">.</div>
        <div></div>
        <div></div>





    </div>

    <!--- parte dos cards dos pratos ---->
        <div class = 'd-flex flex-row justify-content-center'>
    <?php 
    foreach ($pratos as $prato): ?>
            <div class = 'card m-4' style ="width: 13rem; ">
                <img class = "card-img"src="/ProjetoCrudRestaurante/public/assets/php/exibir_imagem.php?img=<?= urlencode($prato['imagem']) ?>" alt="Imagem do prato" width="200">
                <div class ="card-body">
                    <h3 style = "color: #B41C32"class = "card-title"> <?php echo htmlspecialchars($prato['nome']); ?> </h3>
                    <p class = "card-text"><?php echo htmlspecialchars($prato['descricao']); ?> </p>
                    <p class = "card-text"> R$  <?php echo htmlspecialchars($prato['preco']); ?> </p>
                </div>
            </div>
            
            <?php endforeach; ?>
    </div>
        <!----- JS do Bootstrap ------->
    <script src="../../Assets/bootstrap/dist/js/bootstrap.bunde.js"></script>
>>>>>>> 0857ba378b455b9d6f99a1e614ae0ae16ff019b1
</body>

</html>