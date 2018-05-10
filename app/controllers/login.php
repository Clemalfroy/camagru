<?php

require_once __DIR__ . "/controller.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../views/view.php";

class LoginController extends Controller
{
    public static function logout(PDO $DBH, array $params)
    {
        session_destroy();
        session_start();
        header("Location: /");
    }
}

?>