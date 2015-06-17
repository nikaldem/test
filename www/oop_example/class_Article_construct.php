<?php
class Article {
    public $title;
    public $test;
    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }
    public function view()
    {
        echo "<h2>" . $this->title . "</h2>";
        echo $this->text;
    }
}

$a = new Article("Заголовок новости", "На сегодня язык PHP - самый популярный!");
$a->view();

$b = new Article("Следующий заголовок новости", "Усердно изучайте язык PHP и будет Вам счастье !!!");
echo "<br>";
$b->view();

echo "<br>";
$arr[] = [$a, $b];
var_dump($arr);//die;