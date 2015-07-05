<?php
/*  Фронт контроллер  */
//error_reporting(E_ALL);

//var_dump($_SERVER['REQUEST_URI']);
//var_dump($_SERVER);die;
//var_dump($_GET);
//die;

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER[REQUEST_URI], PHP_URL_PATH);
//$path = parse_url($_SERVER[REQUEST_URI], PHP_URL_PATH);
$pathParts = explode('/', $path);
//var_dump($pathParts);
var_dump($_SERVER[REQUEST_URI]);
//echo $path;
//echo dirname($path);
die;

$ctrl = !empty($pathParts[5]) ? $pathParts[5] : 'News';
//var_dump($ctrl);die;
$act = !empty($pathParts[5]) ? $pathParts[5] : 'All';
//var_dump($act);die;
/* require_once __DIR__ . '/models/News.php';

$items = News::getAll();

//var_dump($items);

include __DIR__ . '/views/index.php';  */

//$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
//$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';
//require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';

try {
$controller = new $controllerClassName();

$method = 'action' . $act;
$items = $controller->$method();
} catch (Exception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');
    //die('Что-то пошло не так: ' . $e->getMessage());
}