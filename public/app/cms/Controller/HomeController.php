<?php

namespace App\cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name' => 'artem'];
        $this->view->render('index', $data);
//        echo 'Index page';
    }

//    public function news()
//    {
//        echo 'hello news';
//    }
//
//    public function news_words($id)
//    {
//        print_r($id);
//    }
}