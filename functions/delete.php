<?php
use Application\Controllers\AdminController;
require __DIR__ . '/../autoload.php';
session_start();
if (empty($_POST['title']))
{
    header('Location: /Views/delete.php');
    $_SESSION['error'] = 'Поле не заполнено!!!';
}
else {
    $data=[];
    if (!empty($_POST['title']))
    {
        $data['title'] = $_POST['title'];
        $controller = new AdminController();
        $controller->delete($data);
        header('Location: /index.php');

    }
}

