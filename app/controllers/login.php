<?php

require_once __DIR__ . "/controller.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../views/view.php";
require_once __DIR__."/../mailing/forgottenpwd.php";

class LoginController extends Controller
{
    public static function login(PDO $dbh, array $params)
    {
        if (array_key_exists("forgotten_pwd", $params)) {
            $user = User::find($dbh, "username", $params["username"]);
            $forotten_pwd_mail = new ForgottenPwdMail($user->get_email(), $user->get_pwd());
            $forotten_pwd_mail->send();
            $_SESSION["message"] = "An email to reset your password has been sent";
            header("Location: /log");
        } elseif (User::login($dbh, $params['username'], $params['password'])) {
            session_destroy();
            session_start();
            $_SESSION['login'] = $params["username"];
            unset($_SESSION['message']);
            header("Location: /");
        } else {
            $_SESSION["message"] = "Login failed, wrong credentials or account not confirmed!";
            header("Location: /log");
        }
    }
    public static function logout(PDO $DBH, array $params)
    {
        session_destroy();
        session_start();
        header("Location: /");
    }

    public static function reset_pwd(PDO $DBH, array $params) {
        if (array_key_exists("hash", $params)) {
            echo View::render(__DIR__."/../views/resetpwd.php", array("hash" => $params["hash"]));
        } else {
            header("Location: /");
        }
    }
}

?>