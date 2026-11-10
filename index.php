<?php 
    session_start();
    require_once 'classes.php';

    $database = new Database();
    $db = $database->conectar();
    

    $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $metodo = $_SERVER['REQUEST_METHOD'];

    switch(true){
        case($uri=== '/'):
            header("Location: ".(isset($_SESSION['logado']) ? "/painel":"/login"));
            exit;
        
        case($uri==='/login' && $metodo === 'GET'):
            require 'login.php';
            break;

        case ($uri ==='painel' && $metodo === 'GET'):
            if (!isset($_SESSION['logado'])){
                header("Location: /login");
                exit;
            }

        case($uri==='/logout'):
            session_destroy();
            header("Location:/login");
            exit;

        
        default:
            http_response_code(404);
            echo "<h1> Página não encontrada </h1>";
            break;

    };
    
?>