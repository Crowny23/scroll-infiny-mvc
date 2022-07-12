<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';

// Création d'une instance de AltoRouter
$router = new AltoRouter();

$router->setBasePath('/scroll-infiny-mvc');

$router->map('GET', '/', 'ControllerPost#homepage');

$match = $router->match();

if($match){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller; 
   
    if(is_callable(array($obj, $action))){
         call_user_func_array(array($obj, $action), array($match['params']));
    }
} 