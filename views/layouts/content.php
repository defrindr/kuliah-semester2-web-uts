<?php
$module = "site";
$routes = "index";

$path = "$this->base_root/";

if(isset($_GET['module'])){
    $path .= "{$_GET['module']}/";
}else{
    $path .= "$module/";
}

if(isset($_GET['routes'])){
    $path .= "{$_GET['routes']}.php";
}else{
    $path .= "$routes.php";
}

if(file_exists($path)){
    include "$path";
}else{
    echo "404 not found";
}