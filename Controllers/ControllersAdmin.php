<?php

class ControllersAdmin
{


    public function actionAdd()
    {

        $article = new NewsModel();
        $article->displayAddForm('view/add.php');

        if (!empty($_POST['text'])) {
            $article->title = $_POST['text'];
            $article->time = time();

            $article->insert();
            $id_art = $article->id;

        }
    }

    public function actionUpdate()
    {
        $articleNew = new NewsModel();
        $articleNew->displayAddForm('view/add.php');

        if (!empty($_POST['text'])) {
            $articleNew->title = $_POST['text'];
            $articleNew->time = time();
            $id = '1'; //будет приходить через $_GET
            $articleNew->update($id);


        }
    }
    public function actionDel()
    {
        $article = new NewsModel();
        $id = '1'; //будет приходить через $_GET
        $article->delete($id);

    }
}


