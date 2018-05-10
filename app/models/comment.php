<?php
require_once __DIR__ . "/model.php";
require_once __DIR__ . "/user.php";

class Comment extends Model
{
    public function get_author(PDO $dbh)
    {
        return User::find($dbh, "id", $this->user_id);
    }

    public function get_text()
    {
        return $this->data;
    }
}

?>