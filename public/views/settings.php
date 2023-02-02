<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <title>SETTINGS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <section class='settings'>
            <div class="informations">
                    <img id="user-photo" src="public/img/uploads/UsersAvatars/<?= $user->getImage()?>">
                <div>
                    <p>Name:</p>
                    <p><?=$user->getName()?></p>
                </div>
                <div>
                    <p>Surname:</p>
                    <p><?=$user->getSurname()?></p>
                </div>
                <div>
                    <p>Email:</p>
                    <p><?=$user->getEmail()?></p>
                </div>
                <div>
                    <p>Gender:</p>
                    <p><?=$user->getSex()?></p>
                </div>
                <button onclick="location.href='/updateData'" type="button" class="button-update-info button-font">Update Data</button>
                <button onclick="location.href='/changePassword'" type="button" class="button-update-info button-font">Change Password</button>
            </div>
        </section>
    </main>
</div>
</body>