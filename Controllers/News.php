<?php
namespace Application\Controllers;

use Application\Models\NewsModel;
use Application\Classes\View;

class News
{

    public function actionAll()
    {
        $items =NewsModel::findAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::findOneByPK($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }
}