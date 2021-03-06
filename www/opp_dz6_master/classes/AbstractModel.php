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

    public function __isset($k)
    {
        return isset($this->data[$k]);
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

    public static function findOneByColumn($column, $value) //поиск в базе по наименованию заголовка статьи
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE '. $column . '=:value';
        $res = $db->query($sql, [':value' => $value]);
        //var_dump($res);
        if (empty($res)) {
            $e = new ModelException('Что вы искали? Ничего не найдено...');
            throw $e; // оператор фроу - бросить наше значение
        }
        /*if (!empty($res)) {
            return $res[0];
        } */

        return $res;
    }

    protected function insert()
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
        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
       // $sql = 'UPDATE news SET title=:title, text=:text WHERE id=:id';
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v){
            $data[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }

            $cols[] = $k . '=:' . $k;

        }

        //var_dump($cols);
        //var_dump($data);

        echo $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $db = new DB();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}