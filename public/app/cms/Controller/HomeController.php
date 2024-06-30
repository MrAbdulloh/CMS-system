<?php

namespace App\cms\Controller;

use App\Engine\Controller;

class HomeController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function index()
    {
        echo 'Index page';
    }
    public function news()
    {
        echo 'News page';
    }
}