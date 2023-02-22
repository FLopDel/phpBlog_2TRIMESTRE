<?php
    
    // Crear un array y si se mete un error luego no pasar los datos a un array. Si no detecta errores  meter los datos en un array.
    function validarRequerido(string $texto){
            return !(trim($texto) == '');
        }
    
    function validar_texto(string $texto){
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïüöÄËÏÖÜàèìùòÀÈÙÌÒ\s]+$/";
        return preg_match($patron_texto,$texto);
    }
    function limpiarTexto(string $texto){
        return preg_replace('/[a-zA-Z]/','',$texto);
    }
    function validarInt($numero,$minimo){
        return(filter_var($numero,FILTER_VALIDATE_INT)) && ($numero > $minimo);
    }

    function validarExtras($array){
        return count($array);
    }

    function validarImagen($imagen){
        return $imagen;
    }
    function is_valid_email($str)
    {
    return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
    }

    function validarCampos($nombre,$rol,$descripcion){
        $errores = array();

        if(!validarRequerido($nombre)){
            $errores['nombre'] = "Debes introducir una nombre valida";
        }else{
            $errores['nombre'] = "";
        }

        if(!validarInt($rol,0)){
            $errores['rol'] = "Debes introducir un tamaño valido entre 1 (administrador) y 2(cliente)";
        }else{
            $errores['rol'] = "";
        }

        if(!validarRequerido($descripcion)){
            $errores['descripcion'] = "Debes introducir una observación valida";
        }else{
            $errores['descripcion'] = "";
        }

        
        return $errores;
    }
    function sinErrores($errores){
        return(($errores['nombre'] == "") && ($errores['rol'] == "")  && ($errores['descripcion'] == ""));

    }

?>