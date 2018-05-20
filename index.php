<?php

require_once __DIR__."/app/controllers/login.php";
require_once __DIR__."/app/controllers/user.php";
require_once __DIR__."/app/controllers/picture.php";
require_once __DIR__."/app/controllers/gallery.php";
require_once __DIR__."/app/controllers/root.php";
require_once __DIR__."/app/controllers/comment.php";
require_once __DIR__."/app/controllers/like.php";

require_once __DIR__ . "/app/views/view.php";

$dbh = require_once __DIR__ . "/config/database.php";

session_start();
$_SESSION["couleur"] = "is-danger";

if (preg_match('/(\/login)/', $_SERVER["REQUEST_URI"])) {
    LoginController::login($dbh, $_POST);
} elseif (preg_match('/(\/logout)/', $_SERVER["REQUEST_URI"])) {
    LoginController::logout($dbh, $_POST); 
} elseif (preg_match('/(\/log)/', $_SERVER["REQUEST_URI"])) {
    echo View::render(__DIR__ . "/app/views/login.php");
} elseif (preg_match('/(\/signup)/', $_SERVER["REQUEST_URI"])) {
    echo View::render(__DIR__ . "/app/views/signup.php");
} elseif (preg_match('/(\/register)/', $_SERVER["REQUEST_URI"])) {
    UserController::register($dbh, $_POST);
} elseif (preg_match('/(\/confirm_account)/', $_SERVER["REQUEST_URI"])) {
    UserController::confirm_account($dbh, $_GET);
} elseif (preg_match('/(\/reset_pwd)/', $_SERVER["REQUEST_URI"])) {
    unset($_SESSION['message']);
    LoginController::reset_pwd($dbh, $_GET);
} elseif (preg_match('/(\/set_pwd)/', $_SERVER["REQUEST_URI"])) {
    UserController::set_pwd($dbh, $_POST);
} elseif (preg_match('/(\/parameters)/', $_SERVER["REQUEST_URI"])) {
    echo View::render(__DIR__ . "/app/views/parameters.php");
} elseif (preg_match('/(\/new_pwd)/', $_SERVER["REQUEST_URI"])) {
    UserController::new_pwd($dbh, $_POST);
} elseif (preg_match('/(\/new_username)/', $_SERVER["REQUEST_URI"])) {
    UserController::new_username($dbh, $_POST);
} elseif (preg_match('/(\/new_email)/', $_SERVER["REQUEST_URI"])) {
    UserController::new_email($dbh, $_POST);
} elseif (preg_match('/(\/picture)/', $_SERVER["REQUEST_URI"])) {
    echo View::render(__DIR__ . "/app/views/picture.php");
} elseif (preg_match('/(\/save_webcam)/', $_SERVER["REQUEST_URI"])) {
    PictureController::save_webcam($dbh, $_POST);
} elseif (preg_match('/(\/gallerry)/', $_SERVER["REQUEST_URI"])) {
    GaleryController::show($dbh, $_POST);
} elseif (preg_match('/(\/comment)/', $_SERVER["REQUEST_URI"])) {
    CommentController::create_comment($dbh, $_POST);
} elseif (preg_match('/(\/like)/', $_SERVER["REQUEST_URI"])) {
    LikeController::create_like($dbh, $_POST);
} elseif (preg_match('/(\/delete_picture)/', $_SERVER["REQUEST_URI"])) {
    PictureController::delete_picture($dbh, $_POST);
} else {
    unset($_SESSION['message']);
    RootController::show($dbh, $_POST);
}


