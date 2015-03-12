<?php

namespace Application\Classes;


abstract class AbstractModel
{

    protected static $table;
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public static function getAll()
    {
        $class = get_called_class();
        $db = new DB;
        $db->setClassName($class);
        return $db->query('SELECT * FROM ' . static::$table);
    }

    public static function getOneById($id)
    {
        $db = new DB;
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id]);
        return $res{0};

    }

    protected function insert()
    {
        $data = [];
        $opsh = array_keys($this->data);
        foreach ($opsh as $op) {
            $data[':' . $op] = $this->data[$op];
        }

         $sql = 'INSERT INTO ' . static::$table . '
               (' . implode(', ', $opsh) . ') VALUES
               (' . implode(', ', array_keys($data)) . ')';

        $db = new DB;
        $db->queryInsert($sql, $data);
        $this->data['id'] = $db->LastInsertId();
    }

    protected function update()
    {
        $data = [];
        $arr = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $arr[] = $k . '=:' . $k;
        }
        $db = new DB;
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $arr) .
            ' WHERE id=:id';
        return $db->query($sql, $data);
    }

    public function save()
    {
        if (isset($this->data['id'])) {
            $this->update();
        } else {
            $this->insert();
        }
    }


    public static function getOneByColumn($column, $value)
    {

        $db = new DB;
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
        $res = $db->query($sql, [':value' => $value]);
        if (!empty($res)) {
            return $res[0];
        } else {
            return false;
        }
    }

    public function delete()
    {
        $db = new DB;
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($sql, [':id' => $this->id]);
    }
}








