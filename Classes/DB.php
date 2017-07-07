<?php
namespace Application\Classes;


class DB
{

    private $dbh;
    private $class;

    public function __construct()
    {
        $this->dbh=new \PDO('mysql:dbname=php17;dbhost=localhost','root','death9393');
        $this->dbh->exec('SET CHARSET utf8');
    }
    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

    public function setClass($class)
    {
     $this->class = $class;
    }

    public function querry($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS,$this->class);
    }

    public function insertUpdateDelete($sql,$params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}