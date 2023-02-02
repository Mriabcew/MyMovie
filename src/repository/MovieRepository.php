<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Movie.php';
class MovieRepository extends Repository
{
    public function getMovie(int $id)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM movies WHERE :id = id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $movie = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$movie) {
            return null;
        }

        return new Movie(

            $movie['title'],
            $movie['description'],
            $movie['image'],
            $movie['relase_date'],
            $movie['id'],
            $movie['likes'],
            $movie['dislikes']
        );
    }


    public function getMovies(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM movies ORDER BY title
        ');
        $stmt->execute();
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($movies as $movie){
            $result[]= new Movie(

                $movie['title'],
                $movie['description'],
                $movie['image'],
                $movie['relase_date'],
                $movie['id'],
                $movie['likes'],
                $movie['dislikes']
            );
        }

        return $result;
    }

    public function getMoviesTop100(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM movies ORDER BY likes DESC
        ');
        $stmt->execute();
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($movies as $movie){
            $result[]= new Movie(
                $movie['id'],
                $movie['title'],
                $movie['description'],
                $movie['image'],
                $movie['relase_date'],
                $movie['likes'],
                $movie['dislikes']
            );
        }

        return $result;
    }
    public function getMovieByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM movies WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovieByUser(string $id)
    {
        $result = [];
        $id = intval($id);


        $stmt = $this->database->connect()->prepare('
            SELECT movies.id,title,description,likes,dislikes,relase_date,movies.image FROM movies JOIN movies_users mu on movies.id = mu.id_movie JOIN users u on mu.id_user = u.id WHERE :id = u.id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $movies =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($movies as $movie){
            $result[]= new Movie(

                $movie['title'],
                $movie['description'],
                $movie['image'],
                $movie['relase_date'],
                $movie['id'],
                $movie['likes'],
                $movie['dislikes']
            );
        }
        return $result;

    }

    public function like(int $id) {
        $stmt = $this->database->connect()->prepare('
            UPDATE movies SET "likes" = "likes" + 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function dislike(int $id) {
        $stmt = $this->database->connect()->prepare('
            UPDATE movies SET dislikes = dislikes + 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}