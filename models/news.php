<?php


require_once __DIR__ . '/../classes/AbstractModel.php';


class News
    extends AbstractModel
{
    public $id;
    public $time;
    public $title;

    protected static  $table ='new';
    protected static  $class ='News';




}
