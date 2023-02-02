<?php

class Movie
{

    private $title;
    private $description;
    private $image;

    private $relaseDate;
    private $id;
    private $likes;
    private $dislikes;


    public function __construct($title, $description, $image, $relaseDate,$id=0, $likes=0, $dislikes=0)
    {

        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->relaseDate = $relaseDate;
        $this->id= $id;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
    }


    public function getTitle():string
    {
        return $this->title;
    }


    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public function getDescription():string
    {
        return $this->description;
    }


    public function setDescription($description): void
    {
        $this->description = $description;
    }


    public function getImage():string
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($likes): void
    {
        $this->likes = $likes;
    }

    public function getDislikes()
    {
        return $this->dislikes;
    }

    public function setDislikes($dislikes): void
    {
        $this->dislikes = $dislikes;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getRelaseDate()
    {
        return $this->relaseDate;
    }

    public function setReleaeDate($releseDate): void
    {
        $this->relaseDate = $releseDate;
    }

}