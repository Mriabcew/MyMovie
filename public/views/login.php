<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>MyMovie-Login</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
            <h1>MyMovie</h1>
            <h2>Your movie library!</h2>
        </div>
        <div class = login-container>
            <form class = login action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                            foreach ($messages as $message){
                            echo $message;
                            }
                        }
                        ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">LOGIN</button>
                <button onclick="location.href='./register'" type="button" class="button-singup button-font">You don't have an account, register now</button>
            </form>
        </div>
    </div>
</body>