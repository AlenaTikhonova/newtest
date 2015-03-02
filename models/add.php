<?php


class Add

{
    public $time;
    public $title;

    public  function addNews()
    {
        $db = new DB;
        $sql = "INSERT INTO new (time, title) VALUES ('" . $this->time . "','" . $this->title . "')";
        $db->queryAdd($sql);
    }


    public function displayAddForm($path)
    {
        include __DIR__.'/../'.$path;
    }

} 