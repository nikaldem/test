<?php


class View
    implements Iterator
{
    protected $data = [];

    //public $items;

/*    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    } */

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function display($template)
    {
        // $this->data['items'] --> $items
        foreach ($this->data as $key => $val){
            $$key = $val;
        }
        include __DIR__ . '/../views/' . $template;
    }



    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }


    public function valid()
    {
        // TODO: Implement valid() method.
    }


    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}