<?php
require_once __DIR__."/controller.php";

class RootController extends Controller
{
    public static function show(PDO $dbh, array $params) {
        $pictures = Picture::all($dbh);
        echo View::render(__DIR__."/../views/index.php", array("pictures_paths" => $pictures,
            "dbh" => $dbh));
    }
}

?>