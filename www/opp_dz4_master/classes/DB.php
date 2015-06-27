<?php

class DB
{
    private $dbh;

    public function __construct()
    {
        /* mysql_connect('localhost', 'root', '');
        mysql_select_db('test');  */

        $this->dbh = new PDO('mysql:dbname=test;host=localhost', 'root', ''); //объект хранит связь с нашей базой данных
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql); //подготовит запрос
        $sth->execute($params); //выполнить запрос с указанными параметрами
        return $sth->fetchAll(PDO::FETCH_OBJ); // возвращаем строки результата запроса
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