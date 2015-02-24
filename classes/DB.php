<?php

class DB
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('title');


    }

    public function query($sql, $class='stdClass')
    {
        $res = mysql_query($sql);
        if ($res === false) {
            return false;
        }
        $result = [];
        while ($row = mysql_fetch_object($res,$class)) {
            $result[] = $row;
        }
        return $result;
    }


}