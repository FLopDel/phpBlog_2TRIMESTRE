<?php 
    use Models\Categoria;
?>
<?php
    session_start();
        if (empty($_SESSION)) {
        echo '<p>No hay sesion iniciada<br></p>';
    }else{
        echo "<p>Sesion: ".$_SESSION['usuario']['usuar']."</p>";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../src/css/style.css" type="text/css">
    <link rel="stylesheet" href="../src/css/zebra_pagination.css" type="text/css">

</head>
<body>
<header>

<nav>
    <ul>
        <li><a href="<?=base_url?>">Inicio</a></li>
        <li><a href="login">Identificate</a></li>
        <li><a href="registro">Registrate</a></li>
        <li><a href="mostrarTodos">Mostrar Entradas</a></li>
        <li><a href="logout">Cerrar Sesion</a></li> 

    </ul>

</nav>
</header>
