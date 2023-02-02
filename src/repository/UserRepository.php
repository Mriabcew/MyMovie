<?php

require_once  'Repository.php';
require_once  __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUserByEmail(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        return new User(
            $user['email'],
            $user['password'],
            $user['image'],
            $user['sex'],
            $user['name'],
            $user['surname'],
            $user['role'],
            $user['id']
        );
    }

    public function getUserById(int $idUser):?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            return null;
        }

           return new User(
            $user['email'],
            $user['password'],
            $user['id_user']
        );
    }
    public function addNewUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, password,name,surname,role,sex)
            VALUES (?, ?,?,?,?,?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function updatePassword(User $user, $newPassword): void
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE users SET password = :password
            WHERE id = :id_user
        ');
        $idUser = $user->getId();
        $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }


    public function addUser(User $user)
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password,name,surname,role,sex)
            VALUES (?,?,?,?,?,?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getRole(),
            $user->getSex(),

        ]);
    }

    public function updateUser(User $user)
    {
        $userName=$user->getName();
        $userSurname = $user->getSurname();
        $userGender = $user->getSex();
        $userImg = $user->getImage();
        $idUser = $user->getId();

        $stmt = $this->database->connect()->prepare('
            UPDATE users SET name = :name,surname=:surname,sex=:gender,image=:image WHERE id = :id
        ');
        $stmt->bindParam(':name', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':surname',$userSurname , PDO::PARAM_STR);
        $stmt->bindParam(':gender', $userGender, PDO::PARAM_STR);
        $stmt->bindParam(':image', $userImg, PDO::PARAM_STR);
        $stmt->bindParam(':id', $idUser, PDO::PARAM_STR);

        $stmt->execute();
    }


}