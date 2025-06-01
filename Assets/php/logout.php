<?php
session_start();
session_destroy();
header("Location: /ProjetoCrudRestaurante/login_screen/login.html");
exit();
?>