<?php
require_once 'config/routes.php';

$url = $_GET['url'] ?? '';
if ($url == '') {
    $url = $route['default_controller'] . '/index';
}

$url = trim($url, '/');
$segment = explode('/', $url);

$controller = $segment[0] ?? $route['default_controller'];
$method     = $segment[1] ?? 'index';
$parameters = array_slice($segment, 2); // ambil semua parameter setelah method

$controllerName = ucfirst($controller);
$controllerFile = 'controller/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    if (class_exists($controllerName)) {
        $objController = new $controllerName();
        if (method_exists($objController, $method)) {
            // panggil method dengan semua parameter
            call_user_func_array([$objController, $method], $parameters);
        } else {
            echo ("Method '$method' tidak ditemukan di controller $controllerName.");
        }
    } else {
        echo ("Class controller '$controllerName' tidak ditemukan.");
    }
} else {
    echo ("File controller '$controllerFile' tidak ditemukan.");
}
