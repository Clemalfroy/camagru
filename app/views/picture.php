<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>Login - Camagru</title>
</head>

<?php include __DIR__ . "/header.php" ?>

    <div id="webcam">
        <video id="video"></video>
        <canvas id="canvas" style="display: none"></canvas>
        <button id="startbutton">Prendre une photo</button>
        <form action="/save_webcam" method="post">
            <input id="photo_input" type="hidden" name="data">
            <input type="submit" value="save picture">
        </form>
    </div>
    <div id="last_pictures" style="background-color: orange;">
    </div>
    <div>
        <form enctype="multipart/form-data" method="POST" action="/upload">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input type="file" name="userfile" accept="image/x-png,image/gif,image/jpeg">
            <input type="submit" value="upload file"/>
        </form>
    </div>

<script src="/app/views/js/webcam.js"></script>


<?php include __DIR__ . "/footer.php" ?>
