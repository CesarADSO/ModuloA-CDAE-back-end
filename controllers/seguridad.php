<?php

// SE INICIA SESIÓN
session_start();
if (!isset($_SESSION['autenticado'])) {
    echo '<script>alert("Por favor inicie sesión para ingresar a esta interfaz")</script>';
    echo '<script>location.href="../views/login.html"</script>';
};
