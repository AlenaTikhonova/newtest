<?php




class ControllersNews
{
    public function actionAll(){
        $view= new View;
        $items = News::getAll();
        $view->items=$items;
        $view->display('news/all.php');    }

    public function actionOne(){
        $id = $_GET['id'];
        $view= new View;
        $item = News::getOne($id);
        $view->item=$item;
        $view->display('news/one.php');

    }
}