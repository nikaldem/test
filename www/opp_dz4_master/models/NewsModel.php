<?php


class NewsModel
    extends AbstractModel
{
    protected static $table = 'news'; // переопределяем $table

    public $id;
    public $title;
    public $text;
}