<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';
require_once 'config/config.php';
require_once 'helper/url_helper.php';

$url = $_GET['url'] ?? $route['default_controller'] . '/' . $route['default_method'];
//if ($url == '') {
//    $url = $route['default_controller'] . '/index';
//}
//$url = trim($url, '/');


$segment = explode('/', trim($url, '/'));

$controllerName = ucfirst($segment[0] ?? $route['default_controller']);
$method = $segment[1] ?? $route['default_method'];
$parameter = $segment[2] ?? null;

$controllerFile = 'controller/' . $controllerName . '.php';
//if (file_exists($controllerFile)) {
//    require_once $controllerFile;
//}
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
