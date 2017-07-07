<?php

namespace Application\Controllers;
use Application\Models\NewsModel;

/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 03.07.17
 * Time: 15:10
 */
class AdminController
{
    public function insertNews($data)
    {
        $news = new NewsModel();
        $news->title = $data['title'];
        $news->text = $data['text'];
        $news->author = $data['author'];
        $news->save();
    }

    public function updateNews($data)
    {
        $news = new NewsModel();
        $news->id = $data['id'];
        $news->title = $data['title'];
        $news->text = $data['text'];
        $news->author = $data['author'];
        $news->save();
    }

    public function delete($data)
    {
        $news = new NewsModel();
        $news->title = $data['title'];
        $news->delete();
    }

}