<?php

class Table {

    protected $storage;

    public function putInStorage($value)
    {
        $this->storage = $value;
    }

    public function getFromStorage()
    {
        return $this->storage;
    }
}

$t = new Table();
$t->putInStorage('TEST');
echo $t->getFromStorage();
//var_dump($t);