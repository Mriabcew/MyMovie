<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';


class UserController extends AppContoller
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this ->userRepository = new UserRepository();
    }

    public function profile()
    {
         $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
         $this->render('profile',['user'=>$user]);
    }

    public function settings()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $this->render('settings',['user'=>$user]);
    }

}