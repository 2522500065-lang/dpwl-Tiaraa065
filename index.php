<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';

$url = $_GET['url'] ? $_GET['url'] : $routet['default_controller'] . '/' . $routet['default_method'];
//if ($url == '') {
//$url = $routet['default_controller'] . '/index';
//}

$url = trim($url, '/');
$segment = explode('/', $url);
$controller = $segment[0] ?? $routet['default_controller'];
$method = $segment[1] ?? 'index';
$parameter = $segment[2] ?? null;

//$controllerName = ucfirst($controller);
$controllerName = ucfirst($segment[0]);
$controllerFile = 'controller/' . $controllerName . '.php';
//if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $objController = new $controllerName();
    if (method_exists($objController, $method)) {
        if ($parameter !== null) {
            $objController->$method($parameter);
        } else {
            $objController->$method();
        }
    } else {
        echo "Method tidak ditemukan.";
    }
//} else {
//    echo "Controller tidak ditemukan.";
//}
?>
