<?php

class Article {
    public $title;
    public $test;
    public function view()
    {
        echo "<h2>" . $this->title . "</h2>";
        echo $this->text;
    }
}

$a = new Article();
$a->title = "Заголовок новости";
$a->text = "На сегодня язык PHP - самый популярный!";
$a->view();

$b = new Article();
$b->title = "Следующий заголовок новости";
$b->text = "Усердно изучайте язык PHP и будет Вам счастье !!!";
echo "<br>";
$b->view();

$arr[] = [$a, $b];
var_dump($arr);//die;