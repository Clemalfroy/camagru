<?php

require_once __DIR__ . "/controller.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../views/view.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params)
    {
        if (User::login($dbh, $params['username'], $params['password'])) {
            $_SESSION['login'] = $params["username"];
        } else {
            $_SESSION["message"] = "Login failed, wrong credentials or account not confirmed!";
        }
        header("Location: /");
    }

    public static function log(PDO $dbh, array $params)
    {
        echo View::render(__DIR__."/app/views/login.php");
    }

    public static function logout(PDO $DBH, array $params)
    {
        session_destroy();
        session_start();
        header("Location: /");
    }
}

?>