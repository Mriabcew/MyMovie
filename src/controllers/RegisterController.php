<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class RegisterController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function register()
    {
        if(!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST["email"];
        $password = sha1($_POST["password"]);
        $confirmedPassword = sha1($_POST["confirm-password"]);

        $user = $this->userRepository->getUserByEmail($email);

        if($user) {
            return $this->render('register', ['messages' => ['User with this email exist!']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, $password);
        $this->userRepository->addNewUser($user);
        $user = $this->userRepository->getUserByEmail($email);


        return $this->render('register', ['messages' => ['Registration was successful, sign in!']]);
    }
}