<?php
    session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login-screen.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Sobre nós</title>
    <link rel="stylesheet" href="../Assets/css/sobrenos.css">
</head>
<body>
    <header>
        <?php include(__DIR__ . '/../includes/header.php'); ?>
    </header>
  <div class="sobre-nos">
    <div class="conteudo">
      <h1>Sobre nós</h1>
      <p>
        O AlDente & Za’atar nasceu do encontro entre duas culturas riquíssimas: a leveza e tradição italiana com a intensidade e sabor marcante da culinária árabe. 
        Fundado por Antoni Zighher no século XX, o restaurante é fruto de uma jornada única: desde a infância apaixonado pela cozinha italiana, Antoni se encantou ainda mais com a gastronomia ao trabalhar em um restaurante árabe na Bretanha, norte da França. Inspirado pela convivência com esses dois mundos, Zighher decidiu unir o melhor de cada um — as massas artesanais da Itália com os temperos vibrantes do Líbano — criando uma experiência gastronômica original, acolhedora e surpreendente. Foi assim que nasceu o AlDente & Za’atar: mais do que um restaurante, um lugar onde tradições se encontram e novos sabores ganham vida.
      </p>
    </div>
  </div>
  <footer>
        <?php include(__DIR__ . '/../includes/footer.php'); ?>
    </footer>
</body>
</html>