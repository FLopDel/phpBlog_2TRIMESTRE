<?php

namespace Utils;
require_once 'validacion.php';

class Utils{
 
    public function validar_registro($array):?array{
            
        $errores = array();
    
            if(!validar_texto($array['nombre'])){
                $errores['nombre'] = "Debes introducir un nombre valido";
            }else{
                $errores['nombre'] = "";
            }
    
            if(!validar_texto($array['usuario'])){
                $errores['usuario'] = "Debes introducir unos usuario validos";
            }else{
                $errores['usuario'] = "";
            }
            
            $email = filter_var($array['email'],FILTER_SANITIZE_EMAIL);
            if(!is_valid_email($email)){
                $errores['email'] = "Debes introducir un email valido";
            }else{
                $errores['email'] = "";
            }

            if(strlen($array['password']) < 6){
                $errores['password'] = "Contiene menos de 6 caracteres";
            }else{
                $errores['password'] = "";
            }

            if(strlen($array['password']) > 16){
                $errores['password'] = "La clave no puede tener más de 16 caracteres";
            }else{
                $errores['password'] = "";
            }

            if (!preg_match('`[0-9]`',$array['password'])){
                $errores['password'] =  "La clave debe tener al menos un caracter numérico";
            }else{
                $errores['password'] = "";
            }

            if (!preg_match('`[A-Z]`',$array['password'])){
                $errores['password'] =  "La clave debe tener al menos una letra mayúscula";
            }else{
                $errores['password'] = "";
            }
    
            return $errores;
    }
   
    public function sinErroresRegistro($errores){
        return(($errores['nombre'] == "")&&($errores['usuario'] == "")&&($errores['email'] == "")&&($errores['password'] == ""));

    }

    public function validar_login($array):?array{
            
        $errores = array();
            $email = filter_var($array['email'],FILTER_SANITIZE_EMAIL);
            if(!is_valid_email($email)){
                $errores['email'] = "Debes introducir un email valido";
            }else{
                $errores['email'] = "";
            }

            if(strlen($array['password']) < 6){
                $errores['password'] = "Contiene menos de 6 caracteres";
            }else{
                $errores['password'] = "";
            }

            if(strlen($array['password']) > 16){
                $errores['password'] = "La clave no puede tener más de 16 caracteres";
            }else{
                $errores['password'] = "";
            }

            return $errores;
    }
   
    public function sinErroresLogin($errores){
        return(($errores['email'] == "")&&($errores['password'] == ""));

    }

    public function validar_crearEntradas($array):?array{
            
        $errores = array();
            if(!validarRequerido($array['titulo'])){
                $errores['titulo'] = "No puede estar vacio";
            }else{
                $errores['titulo'] = "";
            }

            if(!validarRequerido($array['descripcion'])){
                $errores['descripcion'] = "No puede estar vacio";
            }else{
                $errores['descripcion'] = "";
            }

            return $errores;
    }
   
    public function sinErrorescrearEntradas($errores){
        return(($errores['titulo'] == "")&&($errores['descripcion'] == ""));

    }

    public function validar_borrarEntrada($data):?array{
            
        $errores = array();
            if(!validarRequerido($data)){
                $errores['id_entrada'] = "No puede estar vacio";
            }else{
                $errores['id_entrada'] = "";
            }
            return $errores;
    }
   
    public function sinErroresBorrarEntrada($errores){
        return(($errores['id_entrada'] == ""));
    }

    public function validar_crearCategoria($data):?array{
            
        $errores = array();
            if(!validarRequerido($data)){
                $errores['nombre'] = "No puede estar vacio";
            }else{
                $errores['nombre'] = "";
            }
            return $errores;
    }
   
    public function sinErrorescrearCategoria($errores){
        return(($errores['nombre'] == ""));
    }


}