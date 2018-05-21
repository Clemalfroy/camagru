<?php
require_once __DIR__."/controller.php";
require_once __DIR__."/../models/user.php";
require_once __DIR__."/../models/comment.php";
require_once __DIR__."/../mailing/notification.php";
class CommentController extends Controller
{
    public static function create_comment(PDO $dbh, array $params) {
        if (array_key_exists("picture_id", $params) && array_key_exists("login", $_SESSION)) {
            $user = User::find($dbh, "username", $_SESSION["login"]);
            $owner = User::find($dbh, "id", $params["author_id"]);
            $email = new NotificationMail($owner->get_email());
            if ($owner->get_notif()) {
                print $owner->get_notif();
                $email->send();
            }
            Comment::create($dbh, array(
                "user_id" => $user->get_id(),
                "picture_id" => $params["picture_id"],
                "data" => $params["comment"]));
        }
        header("Location: /gallerry");
    }
}
?>