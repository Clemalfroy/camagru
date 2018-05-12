<?php
require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../views/view.php";
require_once __DIR__."/../mailing/confirmation.php";
class UserController extends Controller
{
    public static function render_sign_up(PDO $dbh, array $params) {
        echo View::render(__DIR__."/../views/sign_up.php");
    }
    public static function register(PDO $dbh, array $params) {
        if (array_key_exists("register", $params)) {
            unset($params["register"]);
        }
        $params["confirmed"] = "0";
        if (User::exists($dbh, $params)) {
            $_SESSION["message"] = "Username or email already exists. please try again";
            echo View::render(__DIR__."/../views/signup.php");
        } else {
            User::create($dbh, $params);
            $confirmation_mail = new AccountConfirmationMail($params["email"], $params["username"]);
            $confirmation_mail->send();
            $_SESSION["message"] = "A confirmation email has been set to your adress. please confirm";
            echo View::render(__DIR__."/../views/index.php");
        }        
    }
    public static function confirm_account(PDO $dbh, array $params) {
        if (array_key_exists("username", $params)) {
            $user = User::find($dbh, "username", $params["username"]);
            if (!is_null($user)) {
                $user->set_confirmed(true
                    );
                $user->save($dbh);
                $_SESSION["message"] = "Your account is confirmed, you can now login";
            } else {
                $_SESSION["message"] = "Username not found. please contact someone";
            }
            echo View::render(__DIR__."/../views/index.php");
        } else {
            header("Location: /");
        }
    }
    public static function set_pwd(PDO $dbh, array $params){
        if (array_key_exists("hash", $params) && array_key_exists("new_pwd", $params)) {
            $user = User::find($dbh, "password", $params["hash"]);
            $user->set_pwd($params["new_pwd"]);
            $user->save($dbh);
            $_SESSION["message"] = "Your password has been changed, you can now login";

        }
        header("Location: /log");
    }
    public static function new_pwd(PDO $dbh, array $params){
        if (key_exists("login", $_SESSION)){
            $user = User::find($dbh, "username", $_SESSION["login"]);
            $user->set_pwd($params["new_pwd"]);
            $user->save($dbh);
            $_SESSION["message"] = "Your password has been changed";

        }
        else {
            $_SESSION["message"] = "You are not logged in";
        }
        header("Location: /parameters");
    }
    public static function new_email(PDO $dbh, array $params){
        if (key_exists("login", $_SESSION)){
            $user = User::find($dbh, "username", $_SESSION["login"]);
            $user->set_email($params["new_email"]);
            $user->save($dbh);
            $_SESSION["message"] = "Your email has been changed";

        }
        else {
            $_SESSION["message"] = "You are not logged in";
        }
        header("Location: /parameters");
    }
    public static function new_username(PDO $dbh, array $params){
        if (key_exists("login", $_SESSION)){
            $user = User::find($dbh, "username", $_SESSION["login"]);
            $user->set_username($params["new_username"]);
            $user->save($dbh);
            $_SESSION["message"] = "Your username has been changed";

        }
        else {
            $_SESSION["message"] = "You are not logged in";
        }
        header("Location: /parameters");
    }
}
?>