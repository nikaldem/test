<?php

require_once __DIR__ . '/autoload.php';
/* require_once __DIR__ . '/models/News.php';

$items = News::getAll();

//var_dump($items);

include __DIR__ . '/views/index.php';  */

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';
//require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';

$controller = new $controllerClassName();

$method = 'action' . $act;
$controller->$method();