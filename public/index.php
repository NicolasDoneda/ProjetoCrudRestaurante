<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: /ProjetoCrudRestaurante/public/layouts/login-screen.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home - Al Dente & Za’atar</title>
    <link rel="stylesheet" href="./assets/css/homeScreenStyle.css"/>
    <link rel="stylesheet" href="./assets/css/headerFooterStyle.css"/>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
</head>

<body>
    <header>
        <?php include '../public/includes/header.php'; ?>
    </header>

    <main>
        <section class="banner-principal">
            <h1 class="titulo-secundario-home">Seja Bem-Vindo ao</h1>
            <h2 class="titulo-primario-home">ALDENTE & ZA’ATAR</h2>
            <div class = 'text'>
            <p>
                AlDente & Za’atar iniciou-se no século XX, quando Antoni Zighher apreciava os pratos da cultura italiana desde a sua infância, e trabalhou em um restaurante árabe na Bretanha (norte da França), conhecendo as riquezas de ambas as culturas. Antes de seu falecimento, Antoni resolveu misturar os incrementos gastronômicos da Itália e a picância do Líbano em um único sabor, transformando a sua curiosidade em uma experiência aconchegante e acolhedora. A abertura do restaurante ocorreu pouco depois dessa descoberta, fazendo então com que Zighher fundasse a nossa empresa, colidindo com as crenças italianas e as ideologias árabes.
            </p>
            </div>
        </section>

        <section class="secao-mais-pedidos">
            <h2 class="titulo-principal-home">Mais Pedidos</h2>
            <div class="MaisPedidosCarrosel-container">
                <div id="MaisPedidosCarrosel" class="carousel slide" data-bs-ride="carousel">
                    
                    <!-- INDICADORES DE POSIÇÃO -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#MaisPedidosCarrosel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#MaisPedidosCarrosel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#MaisPedidosCarrosel" data-bs-slide-to="2"></button>
                    </div>

                    <!-- ITENS DO CARROSEL -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./assets/images/images-home/prato1.png" class="d-block w-100 img-fluid MaisPedidosCarrosel-prato-img" alt="Prato 1">
                            <div class="carousel-caption d-none d-md-block">
                                <span>Spaghetti à Carbonara</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./assets/images/images-home/prato2.png" class="d-block w-100 img-fluid MaisPedidosCarrosel-prato-img" alt="Prato 2">
                            <div class="carousel-caption d-none d-md-block">
                                <span>Risoto de Cogumelos</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./assets/images/images-home/prato3.jpg" class="d-block w-100 img-fluid MaisPedidosCarrosel-prato-img" alt="Prato 3">
                            <div class="carousel-caption d-none d-md-block">
                                <span>Kebab</span>
                            </div>
                        </div>
                    </div>

                    <!-- CONTROLES -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#MaisPedidosCarrosel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#MaisPedidosCarrosel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include '../public/includes/footer.php'; ?>
    </footer>
    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
