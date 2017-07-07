<?php
use Application\Controllers\AdminController;
require __DIR__ . '/../autoload.php';

session_start();
if (empty($_POST['id'])|| empty($_POST['title']) || empty($_POST['text']) || empty($_POST['author']))
{
    header('Location: /Views/update.php');
    $_SESSION['error'] = 'Не заполнено одно из полей!!!';
}
else
{
    $data = [];
    if (!empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['author'])) {
        $data['id'] = $_POST['id'];
        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $data['author'] = $_POST['author'];
        $admctr = new AdminController();
        $admctr->updateNews($data);
        header('Location: /index.php');
    }
}