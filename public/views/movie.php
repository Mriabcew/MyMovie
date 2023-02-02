<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/moviePage.css">
    <script src="https://kit.fontawesome.com/c8b7e9466f.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>
<body>
<div class="container">
    <nav>
        <img src="../public/img/logo.svg">
        <ul>
            <li>
                <i class="fa-solid fa-house"></i>
                <a href="../movies" class="button">Main Page</a>
            </li>
            <li>
                <i class="fa-solid fa-fire"></i>
                <a href="../top100" class="button">Top 100</a>
            </li>
            <li>
                <i class="fa-regular fa-folder"></i>
                <a href="../library" class="button">Your Movies</a>
            </li>
            <li>
                <i class="fa-solid fa-user"></i>
                <a href="../profile" class="button">Profile</a>
            </li>
            <li>
                <i class="fa-solid fa-gear"></i>
                <a href="../settings" class="button">Settings</a>
            </li>
            <li>
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="../logout" class="button">Logout</a>
            </li>
        </ul>
    </nav>
    <main>
        <section class="movie-card">
            <div class="movie-section">
                <img id="movieImg" src="../public/img/uploads/<?= $movie->getImage()?>">
                <h2><?= $movie->getTitle()?></h2>
                <p><?= $movie->getDescription()?></p>
                <br> </br>
                <p>Data premiery: <?=$movie->getReleseDate()?></p>
                <div class="social-section">
                    <i class="fas fa-heart"> <?= $movie->getLikes()?> </i>
                    <button>Add to library</button>
                    <i class="fas fa-minus-square"> <?= $movie->getDislikes()?>  </i>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="movies">

</div>
</body>


</HTML>