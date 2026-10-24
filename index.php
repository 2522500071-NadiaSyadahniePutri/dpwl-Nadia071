<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';
require_once 'config/config.php';
require_once 'helper/url_helper.php';

$url = $_GET['url'] ?? $route['default_controller'] . '/' . $route['default_method'];

$segment = explode('/', trim($url, '/'));

$controller = $segment[0] ?? $route['default_controller'];
$method = $segment[1] ?? 'index';
$parameter = $segment[2] ?? null;

$controllerName = ucfirst($controller);

if ($controllerName === 'Mobil_c') {
    $controllerName = 'Mobil_C';
}

$controllerFile = 'controller/' . $controllerName . '.php';

if ($controllerName === 'Mobil_C') {
    $controllerFile = 'controller/c_master/Mobil_C.php';
}

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerName)) {
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
    } else {
        echo "Class '$controllerName' tidak ditemukan.";
    }
} else {
    echo "File controller tidak ditemukan: " . $controllerFile;
}