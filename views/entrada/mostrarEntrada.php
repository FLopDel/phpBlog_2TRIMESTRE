<h2>ENTRADA</h2>
<?php
foreach ($entradaConTitulo as $fila) {
    foreach($fila as $campo => $valor){
        if (!is_numeric($campo)) {
            echo "$campo : $valor <br><br>";
        } 
    }
    
}

