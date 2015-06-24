<?php

//require_once __DIR__ . '/../models/News.php';

class NewsController
{
    public function actionAll()
    {
        $items = News::getAll();
        $view = new View();
        //$view->assign('items', $items);
        $view->items = $items;

        //var_dump($view->items);die;

        $view->display('news/all.php');

        //include __DIR__ . '/../views/news/all.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        $view->assign('item', $item);

        $view->display('news/one.php');

        //include __DIR__ . '/../views/news/one.php';
    }

}