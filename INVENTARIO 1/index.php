<?php require "./inc/session_start.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./inc/head.php"; ?>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS para el estilo del menú -->
</head>
<body>
    <?php

        if(!isset($_GET['vista']) || $_GET['vista']==""){
            $_GET['vista']="login";
        }

        // Verificar la sesión y la vista
        if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){

            // Cerrar sesión si no hay sesión activa
            if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                include "./vistas/logout.php";
                exit();
            }
            
            // Incluir el menú y el contenido
            include "./inc/navbar.php";
            echo '<div class="container">';
            include "./vistas/".$_GET['vista'].".php";
            echo '</div>';

            include "./inc/script.php";

        } else {
            if($_GET['vista']=="login"){
                include "./vistas/login.php";
            } else {
                include "./vistas/404.php";
            }
        }
    ?>
</body>
</html>
