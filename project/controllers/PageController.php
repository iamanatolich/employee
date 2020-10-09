<?php
namespace Project\Controllers;
use \Core\Controller;
use Core\Page;
use Project\Assets\Functions;
use Project\Models\Users;

class PageController extends Controller
{
    public function index()
    {
        if(Functions::isLogin()) {
            $this->redirect("/users/");
        }
        $this->title = 'Добро пожаловать!';
        return $this->render('page/index');
    }
}