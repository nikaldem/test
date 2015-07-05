<?php

//require_once __DIR__ . '/../classes/AbstractModel.php';

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');


        //try { //попытайся в базе данных найти статью с заголовком "Привет"
        //$art = NewsModel::findOneByColumn('title', 'Привет!');
        //} catch (ModelException $e) {    //а если не получится, то поймай исключение
        //    die('Что-то пошло не так ' . $e->getMessage());
        //}
        //$db = new DB();
        //$res = $db->query('SELECT * FROM news');
        //$res = $db->query('SELECT * FROM news WHERE id=:id', [':id' => 3]);

       // var_dump(          NewsModel::findOneByPk(1)             );

        /* $article = new NewsModel();
        $article->title = 'Привет 2';
        $article->text = 'Привет, мир 2'; */

       // $article = News::findOneByColumn('title', 'Привет');

        //var_dump( ($article) );

        /*$art = new NewsModel();
        $art->title = 'Сегодня в мире';
        $art->text = 'Не все спокойно из-за неумелого упраления';
        $art->save();  */

       //$art = NewsModel::findOneByColumn('title', 'Привет');
       /* if (!empty($res)) {
            return false;
        }
        //var_dump($art);
        $art->title = 'Привет дорогие друзья';
        $art->save(); */

        //var_dump($art->id);

        //$article->insert();


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
        $item = NewsModel::getOne($id);
        $view = new View();
        //$view->assign('item', $item);

        $view->display('news/one.php');

        //include __DIR__ . '/../views/news/one.php';
    }

    /*public function actionAdd()
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
    } */
}