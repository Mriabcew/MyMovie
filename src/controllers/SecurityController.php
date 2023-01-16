<?php


require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppContoller
{
    public function login()
    {
        #TODO DODAC BAZE DANYCH
        $user = new User('jan_kowalski@email.pl','admin','jan','kowalski');

        if(!$this->isPost())
        {
            return $this->render('login');
        }
        $email = $_POST["email"];
        $password = $_POST["password"];

        if($user->getEmail() !== $email )
        {
            return $this->render('login',['messages' =>['User with this email not exist!']]);
        }

        if($user->getPassword() !== $password)
        {
            return  $this->render('login',['messages' =>['Wrong password']]);
        }

        //return $this->render('mainPage');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainPage");
    }
}