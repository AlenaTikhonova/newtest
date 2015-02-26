<?php

class DB
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('title');


    }

    public function queryAll($sql, $class = 'stdClass')
    {
        $res = mysql_query($sql);
        if ($res === false) {
            return false;
        }
        $result = [];
        while ($row = mysql_fetch_object($res, $class)) {
            $result[] = $row;
        }
        return $result;
    }

    public function queryOne($sql, $class = 'stdClass')
    {

        return $this->queryAll($sql, $class)[0];
    }

    public function queryAdd($sql)
    {
        mysql_query($sql);

    }
}