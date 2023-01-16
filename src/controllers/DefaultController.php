<?php

require_once 'AppController.php';

class DefaultController extends AppContoller {

    public function index()
    {
        $this->render('login');
    }

    public function mainPage()
    {
        $this->render('mainPage');
    }

    public function register()
    {
        $this->render('register');
    }
    
    public function profile()
    {
        $this->render('profile');
    }

    public function settings()
    {
        $this->render('settings');
    }


    



}