<?php

$dbh = require_once __DIR__ . "/config/database.php";

require_once(__DIR__ . "/app/views/view.php");

session_start();

echo View::render(__DIR__ . "/app/views/index.php");