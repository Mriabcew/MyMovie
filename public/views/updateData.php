<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Update Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="base-container">
    <?php
    include('nav.php');
    ?>
    <main>
        <header id="dataUpdateHeader">
            <div>My Account Data</div>
        </header>
        <section class='my_profile'>
            <div class="user-info-container">
                <form class="user-info" action="APIupdateData" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php if(isset($messages)) {
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <div class="input-header">Sex</div>
                    <select name="sex" id="sex" >
                        <option disabled selected value> -- select an option -- </option>
                        <option value="Man">Man</option>
                        <option value="Woman">Woman</option>
                        <option selected value="undefined">undefined</option>
                    </select>
                    <br> </br>
                    <div class="input-header">Name</div>
                    <input name="name" id="name" type="text" placeholder="Name">
                    <div class="input-header">Surname</div>
                    <input name="surname" id="surname" type="text" placeholder="Surname">
                    <div class>
                        <h6>Profil Image Upload
                        </h6>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('http://i.pravatar.cc/500?img=7');">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="button-save button-font">Save</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>