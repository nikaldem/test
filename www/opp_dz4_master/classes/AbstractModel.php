<?php


abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    /* public static function getTable()
    {
        return static::$table;
    } */

    public static function findAll()
    {
        $class = get_called_class(); //возвращает имя класса (функции), которая вызывает наш код
        $sql = 'SELECT * FROM ' . static::$table;
        //$sql = 'SELECT * FROM ' . static::getTable();
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data); // возвращает список всех полей(ключей) массива
        //$ins = [];
        $data = [];
        foreach ($cols as $col) {
               //$ins[] = ':' . $col; // добавляем каждому названию поля спереди :
               $data[':' . $col] = $this->data[$col];
        }
        //var_dump($ins);die;
        $sql = 'INSERT INTO ' . static::$table . '
        (' . implode(', ', $cols). ')
        VALUES
        (' . implode(', ', array_keys($data)). ')';

        $db = new DB();
        $db->execute($sql, $data);
    }
}