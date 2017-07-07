<?php
require __DIR__ . '/autoload.php';


$contr = isset($_GET['contr']) ? $_GET['contr'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName ='\Application\Controllers\\'.$contr ;


try {
    $controller = new $controllerClassName();
    $method = 'action' . $act;
    $controller->$method();
}
catch (Exception $e)
{
    $view = new View();
    $items=[];
    $items['message'] = $e->getMessage();
    $items['code'] = $e->getCode();
    $view->items = $items;
    $view->display('error.php');
}
?>

<span><a href="/Views/add.php">Добавить новость</a></span>
<span><a href="/Views/update.php">Изменить новость</a></span>
<span><a href="/Views/delete.php">Удалить новость</a></span>
