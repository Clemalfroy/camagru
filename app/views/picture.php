<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" class="has-background-black-ter">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>Take a picture - Camagru</title>
</head>

<?php include __DIR__ . "/header.php" ?>

<section class="section hero has-text-centered is-dark is-bold">
    <div class="container">
        <div class="box has-background-dark" id="webcam">
            <div class="columns">
                <div class="column">
                    <video id="video"></video>
                </div>
                <div class="column" id="show" style="display: None">
                    <canvas id="canvas" style="display: none"></canvas>
                    <img id="photo" src="" alt="Your" width="500">
                </div>
            </div>
            <div class="field is-grouped is-grouped-centered">
                <p class="control">
                    <button class="button is-warning" id="startbutton">Take a picture</button>
                </p>
                <p class="control">
                <div id="save" style="display: None">
                    <form action="/save_webcam" method="post">
                        <input id="photo_input" type="hidden" name="data">
                        <input class="button is-info" type="submit" value="Save picture">
                    </form>
                </div>
                </p>
                <div>
                    <form enctype="multipart/form-data" method="POST" action="/upload">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                        <div class="file">
                            <label class="file-label">
                                <input class="file-input" type="file" name="userfile" accept="image/x-png,image/gif,image/jpeg" onchange="document.forms[1].submit()">
                                <span class="file-cta">
                            <span class="file-icon">
                            <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">Choose a file</span> </span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
<section class="section hero has-text-centered is-dark is-bold">
<form action="/montage" method="post">
    <div id ="montagge" class="container" style="display: None">
        <div class="columns">
            <div class="column">
                <div class="box has-background-dark">
                <input type="image" name="submit_lunettes" value="lunettes" alt="blue" src="/app/uploads/44444.png" height="150">
                </div>
            </div>
            <div class="column">
                <div class="box has-background-dark">
                    <input type="image" name="submit_dee" value="dee" alt="blue" src="/app/uploads/PNG_transparency_demonstration_1.png" height="150">
                </div>
            </div>
            <input id="photo_inpute" type="hidden" name="raw">
        </div>
    </div>
    </form>
</section>

<script src="/app/views/js/webcam.js"></script>


<?php include __DIR__ . "/footer.php" ?>
