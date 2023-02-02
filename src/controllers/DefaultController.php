<?php

require_once 'AppController.php';

class DefaultController extends AppContoller {

    private $movieRepository;

    public function __construct()
    {
        parent::__construct();
        $this->movieRepository=new MovieRepository();
    }


    public function index()
    {
        $this->render('login');
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

    public function top100()
    {
        $this->render('top100',['movies'=>$this->movieRepository->getMoviesTop100()]);
    }

    public function movie()
    {
        $this->render('movie');
    }

    public function updateData()
    {
        $this->render('updateData');
    }

    public function changePassword()
    {
        $this->render('changePassword');
    }



    



}