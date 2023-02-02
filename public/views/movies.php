<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/movies.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <title>Movies</title>
</head>

<body>
<div class="base-container">
        <?php
            include ('nav.php');
        ?>
    <main>
        <header>
            <div class="search-bar">
                    <input placeholder="search movie">
            </div>
            <?php if($user->getRole() === 1):?>
            <div onclick=location.href='addMovie' class="add-movie">
                <i class="fas fa-plus"></i>
                add movie
            </div>
            <?php endif;?>
        </header>
        <section class="movies">
            <?php
            foreach ($movies as $movie): ?>
                <div id="<?= $movie->getId(); ?>">
                <img onclick="window.location='movie/<?=$movie->getID()?>'" src="public/img/uploads/<?= $movie->getImage()?>">
                <div>
                    <h2><?= $movie->getTitle()?></h2>
                    <p><?= $movie->getDescription()?></p>
                    <div class="social-section">
                        <i class="fas fa-heart"> <?= $movie->getLikes()?> </i>
                        <i class="fas fa-minus-square"> <?= $movie->getDislikes()?>  </i>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </section>
    </main>
</div>
</body>


<template id="movie-template">
        <div id="">
            <img src="">
            <div>
                <h2>title</h2>
                <p>description</p>
                <div class="social-section">
                    <i class="fas fa-heart"> 0</i>
                    <i class="fas fa-minus-square"> 0</i>
                </div>
            </div>
        </div>
</template>