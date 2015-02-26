<?php

class ControllersAdmin {


    public function actionAdd(){
        include __DIR__.'/../view/add.php';
        if (!empty($_POST['text'])) {
            $write = [];
            $write['title'] = $_POST['text'];
            $write['time'] = time();
            Add::addNews($write);
        }


    }

}


