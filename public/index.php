<?php
    require_once '../config/config.php';

    require_once __DIR__.'../../vendor/autoload.php';
    require_once '../views/layout/header.php';
    require_once '../Lib/Pages.php';
    require_once '../Lib/Router.php';

    use Dotenv\Dotenv;
    use Lib\Pages;
    use Lib\Router;
    use Controllers\UsuarioController;
    use Controllers\CategoriaController;
    use Controllers\EntradaController;

    // $pages = new Pages();
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->safeLoad();

    // $pages->render('layout/header');
    

    Router::add('GET',"login",function(){
        return (new UsuarioController())->login();    
    });

    Router::add('POST',"login",function(){
        return (new UsuarioController())->login();    
    });

    Router::add('GET','registro',function(){
        return (new UsuarioController())->registro();    
    });

    Router::add('POST','registro',function(){
        return (new UsuarioController())->registro();    
    });
    
    Router::add('GET',"mostrarTodos",function(){
        return (new EntradaController())->mostrarTodos();    
    });

    Router::add('POST',"mostrarTodos",function(){
        return (new EntradaController())->mostrarTodos();    
    });

    Router::add('GET','logout',function(){
        return (new UsuarioController())->logout();    
    });

    Router::add('POST','logout',function(){
        return (new UsuarioController())->logout();       
    });
    
// Index de usuarios registrados

    Router::add('GET',"publicar",function(){
        return (new EntradaController())->publicar();    
    });

    Router::add('POST',"publicar",function(){
        return (new EntradaController())->publicar();    
    });

    Router::add('GET',"modificarUsuario",function(){
        return (new UsuarioController())->modificar();    
    });

    Router::add('POST',"modificarUsuario",function(){
        return (new UsuarioController())->modificar();    
    });

    Router::add('GET',"crearCategoria",function(){
        return (new CategoriaController())->añadir();    
    });

    Router::add('POST',"crearCategoria",function(){
        return (new CategoriaController())->añadir();    
    });

    Router::add('GET',"modificar",function(){
        return (new EntradaController())->modificarDatos();    
    });

    Router::add('POST',"modificar",function(){
        return (new EntradaController())->modificarDatos();    
    });

    Router::add('GET',"borrar",function(){
        return (new EntradaController())->borrar();    
    });

    Router::add('POST',"borrar",function(){
        return (new EntradaController())->borrar();    
    });


    Router::dispatch();

    
    require_once '../views/layout/footer.php';
?>








