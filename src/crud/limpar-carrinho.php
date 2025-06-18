<?php
session_start();
unset($_SESSION['carrinho']);
header("Location: /ProjetoCrudRestaurante/public/layouts/pedidos-screen.php");
exit;
?>