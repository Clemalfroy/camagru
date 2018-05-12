<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>Take a picture - Camagru</title>
</head>

<?php include __DIR__ . "/header.php" ?>

<section class="section hero has-text-centered is-light is-bold">
    <div class="container">
    <div class ="field"id="webcam">
        <video id="video"></video>
    </div>
        <div class ="field">
        <canvas id="canvas" style="display: none"></canvas>
        </div>
        <div class ="field">
        <button class="button is-warning is-inverted" id="startbutton">Take a picture</button>
        </div>
    <div class ="field"
        <form action="/save_webcam" method="post">
            <input class="input" id="photo_input" type="hidden" name="data">
            <input class="button is-warning is-inverted" type="submit" value="Save picture">
        </form>
    </div>
    <div class="field">
        <form enctype="multipart/form-data" method="POST" action="/upload">
            <input class="button is-warning is-inverted" type="file" name="userfile" accept="image/x-png,image/gif,image/jpeg">
            <input class="button is-warning is-inverted" type="submit" value="Upload file"/>
        </form>
    </div>
    </div>
</section>

<script src="/app/views/js/webcam.js"></script>


<?php include __DIR__ . "/footer.php" ?>
