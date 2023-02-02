<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/movies.css">
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
        </header>
        <section class="movies">
            <?php
            if(isset($movies)):
                foreach ($movies as $movie): ?>
                    <div id="Movie">
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
            <?php endforeach; endif;?>
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
