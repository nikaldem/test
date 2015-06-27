<?php

//require_once __DIR__ . '/../classes/AbstractModel.php';

class NewsController
{
    public function actionAll()
    {
        //$db = new DB();
        //$res = $db->query('SELECT * FROM news');
        //$res = $db->query('SELECT * FROM news WHERE id=:id', [':id' => 3]);
        var_dump(          NewsModel::findAll()             );
        die;
     /*   $items = News::getAll();
        $view = new View();
        //$view->assign('items', $items);
        $view->items = $items;

        //var_dump($view->items);die;

        //echo $view->render('news/all.php');
        $view->display('news/all.php');

        //include __DIR__ . '/../views/news/all.php';*/
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        //$view->assign('item', $item);

        $view->display('news/one.php');

        //include __DIR__ . '/../views/news/one.php';
    }

    public function actionAdd()
    {
        if(isset($_POST['save'])){
            $err = false;
            if(empty($_POST['title'])){
                $err = true;
            }
            if(empty($_POST['content'])){
                $err = true;
            }

            if(false == $err){
                $data['title'] = $_POST['title'];
                $data['content'] = $_POST['content'];

                $article = new News;
                $article->insertOne($data);

                header('Location: /');
                die;
            }
        } else {
            $view = new View();
            $view->display('news/add.php');
        }
    }
}