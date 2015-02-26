<?php




class ControllersNews
{
    public function actionAll(){
        $view= new View;
        $view->items = News::getAll();

        require __DIR__ . '/../view/news/all.php';




    }

    public function actionOne(){
        $id = $_GET['id'];
        $view= new View;
        $view->$item = News::getOne($id);

        require __DIR__ . '/../view/news/all.php';

    }
}