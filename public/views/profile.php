<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/profile.css">
        <title>Profile</title>
    </head>
    <body>
        <div class="base-container">
            <?php
            include ('nav.php');
            ?>
            <main>
                <section class="profile">
                    <div class="card">
                            <img class="profilePhoto" src="public/img/uploads/UsersAvatars/<?= $user->getImage()?>">
                            <h1><?= $user->getEmail()?></h1>
                            <p class="title">Name: <?=$user->getName()?></p>
                            <p class="title">Surname: <?=$user->getSurname()?></p>
                            <p class="title">Gender: <?=$user->getSex()?></p>
                            <p><button onclick="location.href='/library'">Library</button></p>
                    </div>
                </section>
            </main>
        </div>

        <div class="movies">
            
        </div>
</body>

    
</HTML>