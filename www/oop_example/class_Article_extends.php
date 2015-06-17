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

class NewsArticle extends Article {
    public $avthor;
    public function view()
    {
        echo "<h2>" . $this->title . "</h2>" . "<h4>" ."  автор:  " . $this->avthor  . "</h4>" ;
        echo $this->text;
    }
}

$a = new NewsArticle("Заголовок новости", "На сегодня язык PHP - самый популярный!");
$a->avthor = "Иванов И.И.";
$a->view();

$b = new NewsArticle("Следующий заголовок новости", "Усердно изучайте язык PHP и будет Вам счастье!");
$b->avthor = "Петрова П.П.";
echo "<br>";
$b->view();