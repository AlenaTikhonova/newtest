<?php
namespace Application\Classes;
class DB
{
    protected $dbh;
    private $className = 'stdClass';


    public function __construct()
    {
        $dsn = 'mysql:dbname=title;host=localhost';
        $this->dbh = new \PDO($dsn, 'root' . '');
    }

    public function setClassName($ClassName)
    {
        $this->className = $ClassName;
    }

    public function query($sql, $subst = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($subst);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);

    }

    public function queryInsert($sql, $subst = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($subst);

    }

    public function queryUpdate($sql, $subst = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($subst);
    }

    public function LastInsertId()
    {
    return $this->dbh->lastInsertId();
    }

}
