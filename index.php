<?php

require_once __DIR__."/app/controllers/login.php";
require_once __DIR__."/app/controllers/user.php";

require_once __DIR__ . "/app/views/view.php";

$dbh = require_once __DIR__ . "/config/database.php";

session_start();

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
}else {
    unset($_SESSION['message']);
    echo View::render(__DIR__ . "/app/views/index.php");
}


