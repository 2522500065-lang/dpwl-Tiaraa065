<?php
require_once 'config/routes.php';
$url = $_GET['url'] ?? '';
if ($url == '') {
    $url = $route['Latihan1Model.php'] . '/index';
}
$url = trim($url, '/');
$segment = explode('/', $url);
$controller = $segment[0] ?? $route['Latihan1Model.php'];
$method     = $segment[1] ?? 'index';
$parameters = $segment[2] ?? null;

$controllerName = ucfirst($controller);
$controllerFile = 'controller/'. $controllerName . '.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $objcontroller = new $controller();
    if(method_exists($objcontroller, $method)) {
       if ($parameters !== null) {
          $objcontroller->$method($parameters);
       } else {
        $objcontroller->$method();
       }
    } else {
        echo "Method tidak ditemukan.";
   }
} else {
  echo "Controller tidak ditemukan.";
}

