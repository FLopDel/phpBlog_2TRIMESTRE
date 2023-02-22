<?php session_start();
require_once ('../../models/Categoria.php');
require_once ('../../models/Entrada.php'); 
use models\Entrada;
use models\Categoria;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../../src/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../src/css/zebra_pagination.css" type="text/css">
</head>
<body>
<header>
<h1>Bienvenido  <?php echo $_SESSION['usuario']['usuar']; ?></h1> 

<nav>
    <ul>
        <li><a href="http://localhost/proyecto/public/index.php">Inicio</a></li>
        <li><a href="http://localhost/proyecto/public/publicar">Publicar Entradas</a></li>
        <li><a href="http://localhost/proyecto/public/modificarUsuario">Modificar Datos Perfil</a></li>
        
    </ul>
    <?php if(($_SESSION['rol']) == 1):?>
    <ul>
        <p>Zona Admin</p>
        <li><a href="http://localhost/proyecto/public/modificar">Modificar Entrada</a></li>
        <li><a href="http://localhost/proyecto/public/borrar">Borrar Entrada</a></li>
    </ul>
    <?php endif?>
</nav>


