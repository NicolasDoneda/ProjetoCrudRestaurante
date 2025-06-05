<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: /ProjetoCrudRestaurante/public/layouts/login-screen.php");
    exit;
}
?>