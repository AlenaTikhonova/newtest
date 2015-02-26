<?php


class Add
{

    public static function addNews(array $write)
    {
        $db = new DB;
        $sql = "INSERT INTO new (time, title) VALUES ('" . $write['time'] . "','" . $write['title'] . "')";
        $db->queryAdd($sql);
    }

} 