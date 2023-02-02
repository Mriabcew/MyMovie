<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/movies.css">
    <title>PROJECTS</title>
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
            foreach ($movies as $movie): $i = 0;$i++?>
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
            <?php
            if($i>99)
                break;
            endforeach;?>
        </section>
    </main>
</div>
</body>
