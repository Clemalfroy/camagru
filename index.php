<?php

$dbh = require_once __DIR__ . "/config/database.php";
require_once __DIR__."/app/controllers/login.php";

require_once(__DIR__ . "/app/views/view.php");

session_start();

if (preg_match('/(\/login)/', $_SERVER["REQUEST_URI"])) {
    LoginController::login($dbh, $_POST);
} elseif (preg_match('/(\/logout)/', $_SERVER["REQUEST_URI"])) {
    LoginController::logout($dbh, $_POST); 
} else {
    echo View::render(__DIR__ . "/app/views/index.php");
}


