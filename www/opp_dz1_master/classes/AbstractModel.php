<?php


abstract class AbstractModel
{
    protected static $table = 'foobar';
    protected static $class;

    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table;  // в м е с т о  self надо писить static
        //echo $sql; die;
        return $db->queryAll($sql, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB();
        $sql ='SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);

    }
}