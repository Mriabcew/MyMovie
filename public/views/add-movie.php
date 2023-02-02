<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Add Movie</title>
</head>

<body>
<div class="base-container">
    <?php
    include ("nav.php");
    ?>
    <main>
        <section class="project-form">
            <h5>Dodawanie filmu</h5>
            <form action="addMovie" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="title" type="text" placeholder="Title"><br>
                <textarea name="description" rows=10 placeholder="Description"></textarea><br>
                <input name="date" type="text" placeholder="Relase Date"><br>
                <input type="file" name="file"/><br/>
                <button type="submit">send</button>
            </form>
        </section>
    </main>
</div>
</body>