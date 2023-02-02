<?php

class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role;
    private $sex;
    private $image;



    public function __construct(string $email,string $password,string $image = "TestUser.jpg", string $sex = "Undefined",string $name ="name", string $surname="surname",int $role = 0, int $id=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->sex = $sex;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->id = $id;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getSurname(): string
    {
        return $this->surname;
    }


    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getRole(): int
    {
        return $this->role;
    }


    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    public function getSex(): string
    {
        return $this->sex;
    }


    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }


}