<?php
require_once __DIR__."/controller.php";
require_once __DIR__."/../models/picture.php";
require_once __DIR__."/../views/view.php";

class PictureController extends Controller
{
    public static function upload(PDO $dbh, array $params) {
        $uploaddir = __DIR__."/../uploads/";
        $uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);
        if ($_FILES["userfile"]["error"] === 4) {
            $_SESSION["message"] = "Please select a picture to upload";
        } elseif (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $user = User::find($dbh, "username", $_SESSION["login"]);
            Picture::create($dbh, array(
                "user_id" => $user->get_id(),
                "file_path" => $uploadfile,
                "name" => $_FILES['userfile']['name'],
                "type" =>$_FILES['userfile']['type']));
        } else {
            $_SESSION["message"] = "There was an error uploading your picture (error_code: " . $_FILES["userfile"]["error"] . ")";
        }
        $pictures = Picture::all($dbh);
        echo View::render(__DIR__."/../views/index.php", array("pictures_paths" => $pictures,
            "dbh" => $dbh));
    }
    public static function get_image(PDO $dbh, array $params) {
        if (!array_key_exists("img_name", $params)) {
            $pictures = Picture::all($dbh);
            echo View::render(__DIR__."/../views/index.php", array("pictures_paths" => $pictures,
                "dbh" => $dbh));
        } else {
            $picture = Picture::find($dbh, "name", $params["img_name"]);
            header("Content-type: " . $picture->get_type());
            readfile($picture->get_path());
        }
    }
    public static function save_webcam(PDO $dbh, array $params) {
        if (array_key_exists("data", $params)) {
            $user              = User::find($dbh, "username", $_SESSION["login"]);
            $data              = $params["data"];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data              = base64_decode($data);
            $file_name         = hash("md5", "cmalfroy  ") . time () . ".png";
            $file_path         = __DIR__ . "/../uploads/" . $file_name;
            file_put_contents($file_path, $data);
            Picture::create($dbh, array(
                "user_id"   => $user->get_id(),
                "file_path" => $file_path,
                "name"      => $file_name,
                "type"      => $type));
            $pictures = Picture::all($dbh);
            echo View::render(__DIR__."/../views/index.php", array("pictures_paths" => $pictures,
                "dbh" => $dbh));
        }
    }
    public static function delete_picture(PDO $dbh, array $params) {
        $comment = Comment::find($dbh, "picture_id", $params["img_id"]);
        $like = Like::find($dbh, "picture_id", $params["img_id"]);;
        $picture = Picture::find($dbh, "id", $params["img_id"]);
        if ($comment) {
            $comment->delete($dbh);
        }
        if ($like) {
            $like->delete($dbh);
        }
        $picture->delete($dbh);
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: $uri");
    }

    public static function montage(PDO $dbh, array $params) {
        if (array_key_exists("submit_lunettes", $params)) {
            $src = imagecreatefrompng(__DIR__."/../uploads/44444.png");
        } elseif (array_key_exists("submit_dee", $params)) {
            $src = imagecreatefrompng(__DIR__."/../uploads/PNG_transparency_demonstration_1.png");
        }
        if (array_key_exists("raw", $params)) {
            $data = $params["raw"];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data              = base64_decode($data);
            $file_name = hash("md5", "cmalfroy  ") . time () . ".png";
            $file_path = __DIR__ . "/../uploads/" . $file_name;
            file_put_contents($file_path, $data);
            $dest = imagecreatefrompng($file_path);
            unlink($file_path);
        }
        echo View::render(__DIR__."/../views/picture.php", $params);
    }
}
?>