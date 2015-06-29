<?php


class View
    implements Iterator
{
    private $position = 0;
    protected $data = [];

    public function __construct(){
        $this->position = 0;
    }

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

    //public function display($template)
    public function render($template)
    {
        // $this->data['items'] --> $items
        foreach ($this->data as $key => $val){
            $$key = $val;
        }
        ob_start();   // выводит все данные в буфер,а не на дисплей
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents(); // выводит содержание буфера в переменную
        ob_end_clean(); // закончить буферизацию и очистить буфер
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }



    public function current()
    {
        $data = current($this->data);
        return $data;

    }

    public function next()
    {
        $data = next($this->data);
        return $data;

    }

    public function key()
    {
        $data = key($thid->data);
        return $data;

    }


    public function valid()
    {
        $key = key($this->data);
        $data = ($key !== NULL && $key !== FALSE);
        return $data;

    }


    public function rewind()
    {
        reset($this->data);

    }
}