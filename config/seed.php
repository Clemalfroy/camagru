<?php

require __DIR__ . "/../app/models/user.php";

$dbh = require "database.php";

User::create($dbh, array(
    "username" => "clement",
    "email" => "clement.malfroy@gmail.com",
    "password" => "clement",
    "confirmed" => true));

User::create($dbh, array(
    "username" => "admin",
    "email" => "admin@gmail.com",
    "password" => "admin",
    "confirmed" => true));
?>