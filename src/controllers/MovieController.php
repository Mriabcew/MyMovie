<?php


require_once 'AppController.php';
require_once __DIR__.'/../models/Movie.php';
require_once __DIR__.'/../repository/MovieRepository.php';

class MovieController extends AppContoller
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];

    const UPLOAD_DIRECTORY = '/../public/img/uploads/';
    private $messages = [];

    private $movieRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this ->movieRepository = new MovieRepository();
        $this->userRepository = new UserRepository();
    }

    public function movies()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $movies = $this->movieRepository->getMovies();
        return $this->render('movies',['movies' => $movies,'user'=>$user]);


    }

    public function top100()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $movies = $this->movieRepository->getMoviesTop100();
        return $this->render('movies',['movies' => $movies,'user'=>$user]);


    }

    public function APIaddLibrary()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $movie = $this->movieRepository->getMovie($_POST['movieId']);
        $this->movieRepository->addToLibrary($user->getId(),$movie->getId());
        header("location:/library");
    }


    public function addMovie()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $movies = $this->movieRepository->getMovies();
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

           $movie = new Movie($_POST['title'],$_POST['description'],$_FILES['file']['name'],$_POST['date']);

           $this->movieRepository->addMovieToDB($movie);
           return $this->render('movies',['messages' => $this->messages,'user'=>$user, 'movies' => $this->movieRepository->getMovies()]);

        }

        $this->render('add-movie',['messages' => $this->messages]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->movieRepository->getMovieByTitle($decoded['search']));
        }
    }

    public function like(int $id) {
        $this->movieRepository->like($id);
        http_response_code(200);
    }

    public function dislike(int $id) {
        $this->movieRepository->dislike($id);
        http_response_code(200);
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


    public function movie(string $id)
    {
        $id = intval($id);
        $movie = $this->movieRepository->getMovie($id);
        if($movie)
        {
            $this->render('movie',['movie'=>$movie]);
        }
    }

    public function library()
    {
        $user = $this->userRepository->getUserByEmail($_COOKIE['user']);
        $id = strval($user->getId());
        $movies = $this->movieRepository->getMovieByUser($id);
        if($movies)
        {
            $this->render('library',['movies'=>$movies]);
        }
        else
        {
            $this->render('library');
        }

    }
}