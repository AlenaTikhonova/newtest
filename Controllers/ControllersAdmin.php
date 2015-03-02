<?php

class ControllersAdmin {


    public function actionAdd(){

        $add_new = new Add();
        $add_new->displayAddForm('view/add.php');

        if (!empty($_POST['text'])) {
            $add_new->title = $_POST['text'];
            $add_new->time = time();

            $add_new->addNews();

        }


    }

}


