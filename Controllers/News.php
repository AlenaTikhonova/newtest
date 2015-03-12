<?php

namespace Application\Controllers;
use Application\models\News as NewsModel;
use Application\Classes\View;

class News
{
    public function actionAll()
    {
        $view = new View;
        $items = NewsModel::getAll();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $view = new View;
        $item = NewsModel::getOneById($id);
        if (empty($item)){
        $e = new \ModelException('We cant find anything');
        throw $e;}
        $view->item = $item;
        $view->display('news/one.php');

    }

    public function actionDel()
    {
        $article = new NewsModel();
        $article->delete();

    }

    public function  actionSave()
    {

        $article = new NewsModel();
        $article->displayAddForm('view/add.php');

        if (!empty($_POST['text'])) {
            $article->title = $_POST['text'];
            $article->time = time();
            $article->save();
        }
    }


}