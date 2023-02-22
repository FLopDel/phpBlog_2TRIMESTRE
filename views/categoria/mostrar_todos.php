<?php
echo "<h1>Categorías</h1>";
foreach($nombreCategoria as $fila){
    foreach($fila as $campo => $valor){
        echo "&nbsp&nbsp&nbsp <a href='#'>$valor</a> &nbsp&nbsp&nbsp ";
    }
}
?>

