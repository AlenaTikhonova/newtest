<?php


abstract class AbstractModel
{

    protected static $table;
    protected  $data=[];

    public function __set($k,$v)
    {
        $this->data[$k]=$v;
    }
    public function __get($k)
    {
        return  $this->data[$k];
    }

    public static function getAll()
    {
        $class = get_called_class();
        $db = new DB;
        $db->setClassName($class);
        return $db->query('SELECT * FROM ' . static::$table);
    }

    public static function getOne($id)
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($sql, [':id' => $id])[0];
    }
    public  function insert()
    {
        $data=[];
        $opsh = array_keys($this->data);
        foreach ($opsh as $op){
            $data[':'.$op] = $this->data[$op];
        }

        print $sql = 'INSERT INTO '. static::$table. '
               ('. implode(', ',$opsh ). ') VALUES
               ('. implode(', ',array_keys($data) ).')';

        $db = new DB;
        $this->data['id']= $db->queryInsert($sql,$data);

    }

    public function update($id)
    {

        function  update_data($data_key, $data_value){
            return $data_key . '= \'' . $data_value. '\'' ;}

        $data_key = array_keys($this->data);
        $data_value= array_values($this->data);

         $arr= array_map( "update_data",$data_key,$data_value);

        $db = new DB;
        $sql = 'UPDATE ' . static::$table . ' SET ' .implode(', ',$arr ).
         ' WHERE id=:id';
       return $db->query($sql, [':id' => $id]);
    }

    public function delete($id)
    {
        $db = new DB;
        $sql = 'DELETE FROM ' . static::$table .' WHERE id=:id';
        return $db->query($sql, [':id' => $id]);
    }
}








