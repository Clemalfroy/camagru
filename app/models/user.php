<?php
require_once __DIR__ . "/model.php";

class User extends Model
{
    public function get_pwd()
    {
        return $this->password;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function get_notif()
    {
        return $this->notif;
    }

    public function get_confirmed()
    {
        return $this->confirmed;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function set_pwd($password)
    {
        $this->password = self::hash_pwd($password);
    }

    public function set_username($username)
    {
        $this->username = $username;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function set_confirmed($value)
    {
        $this->confirmed = $value;
    }

    public static function login(PDO $dbh, $username, $password)
    {
        $user = User::find($dbh, "username", $username);
        if ($user) {
            if ($user->get_confirmed()) {
                return ($user->get_pwd() === hash("sha512", "toto$password"));
            }
        }
        return false;
    }

    private static function hash_pwd($password)
    {
        return hash("sha512", "toto$password");
    }

    public static function create(PDO $dbh, array $params)
    {
        array_key_exists("password", $params);
        $params["password"] = self::hash_pwd($params["password"]);
        return parent::create($dbh, $params);
    }

    public static function exists(PDO $dbh, array $params)
    {
        if (array_key_exists("username", $params)) {
            if (self::find($dbh, "username", $params["username"])) {
                return true;
            }
        }
        if (array_key_exists("email", $params)) {
            if (self::find($dbh, "email", $params["email"])) {
                return true;
            }
        }
        return false;
    }
}

?>