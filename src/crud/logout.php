<?php
session_start();
session_destroy();
header("Location: /ProjetoCrudRestaurante/public/layouts/login_screen/login.html");
exit();
?>