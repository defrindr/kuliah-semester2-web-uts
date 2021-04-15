<?php
include_once 'connection.php';

$base_url = "/uts_web";
$base_root = getRootDir();

$db = new Connection([
    "host" => "localhost",
    "username" => "root",
    "password" => "defrindr",
    "dbname" => "semester2_web_uts",
]);

