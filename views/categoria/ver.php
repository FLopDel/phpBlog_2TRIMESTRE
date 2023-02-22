<?php

use Models\Producto;
use Models\Categoria;

?>

<h1><?=$categoria->nombre?></h1>
    <div id="central">
        <?php while($pro = $productos->fetch(PDO::FETCH_OBJ)):?>

            <div class="entrada">
                <img src="<?=base_url?>img/<?=$pro->imagen?>">
                <h2><?=$pro->nombre?></h2>
                <p><?=$pro->precio?> $</p>
                <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>">Comprar</a>
            

            </div>
            
            <?php endwhile?>
        
    </div>