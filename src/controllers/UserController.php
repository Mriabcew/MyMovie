<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';


class UserController extends AppContoller
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/UsersAvatars/';
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

    public function APIupdateData()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $gender = $_POST['sex'];

        if ($gender === "Man" || $gender === "Woman")
        {
            $user->setSex($gender);
        }
        $name = $_POST['name'];
        if($name)
        {
            $user->setName($name);
        }
        $surname = $_POST['surname'];
        if($surname)
        {
            $user->setSurname($surname);
        }
        if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']);

            $img = $_FILES['file']['name'];
            $user->setImage($img);
        }
        $this->userRepository->updateUser($user);
        header("location:/movies");

    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'],self::SUPPORTED_TYPES))
        {
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }


}