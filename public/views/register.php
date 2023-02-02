<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <title>MyMovie-Register</title>
    <script type="text/javascript" src="public/js/register.js" defer></script>
</head>
<body>
<div class="container">
<div class="logo">
    <img src="public/img/logo.svg">
    <h1>MyMovie</h1>
    <h2>Your movie library!</h2>
</div>
<div class =login-container>
    <form class="register" action="register" method="POST">
        <div class="messages">
            <?php if(isset($messages)) {
                foreach ($messages as $message){
                    echo $message;
                }
            }
            ?>
        </div>
        <div class="input-header">Email</div>
        <input name="email" type="text" placeholder="email@email.com" required>
        <div class="input-header">Password</div>
        <input name="password" type="password" placeholder="password" required>
        <div class="input-header">Confirm password</div>
        <input name="confirm-password" type="password" placeholder="confirm password" required>
        <a>Accept</a><br><input type="checkbox" required>
        <a href="/public/views/TermsAndConditions.pdf" title="Terms and Conditions">Terms and Conditions</a>
        <button class="button-login button-font" type="submit">Register</button>
        <button onclick="location.href='/login'" type="button" class="button-signup button-font">Sign in</button>
        </form>
    </div>
</div>
</body>