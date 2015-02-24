<?php

require_once __DIR__.'/../classes/DB.php';

class News {
    public $id;
    public $time;
    public $title;

    public static  function getAll()
    {
     $res = [];
     $db = new DB;
     return $res = $db->query('SELECT * FROM new','News');

    }


} 