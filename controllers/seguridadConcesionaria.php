<?php

// SE INICIA SESIÓN
session_start();
if (!isset($_SESSION['autenticado'])) {
    echo '<script>alert("Por favor inicie sesión para ingresar a esta interfaz")</script>';
    echo '<script>location.href="../views/login.php"</script>';
};

if ($_SESSION['rol'] != 2) {
    echo '<script>alert("Usted Solo tiene acceso a las intefaces que son para el rol Cliente")</script>';
    echo '<script>location.href="../views/login.php"</script>';
}






?>