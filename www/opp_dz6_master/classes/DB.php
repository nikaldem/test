<?php

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        /* mysql_connect('localhost', 'root', '');
        mysql_select_db('test');  */

        $this->dbh = new PDO('mysql:dbname=test;host=localhost', 'root', ''); //объект хранит связь с нашей базой данных
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql); //подготовит запрос
        $sth->execute($params); //выполнить запрос с указанными параметрами
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className); // возвращаем строки результата запроса
    }

    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql); //подготовит запрос
        return $sth->execute($params); //возвратить выполненный запрос с указанными параметрами (true или false)

    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }


/*    public function queryAll($sql, $class = 'stdClass')
    {
        $res = mysql_query($sql);
        if (false === $res){
            return false;
        }
        $ret = [];
        while ($row = mysql_fetch_object($res, $class)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }
   */
}