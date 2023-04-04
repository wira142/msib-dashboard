<?php
include_once "top.php";
include_once "menu.php";
include "routes/route.php";

$route = new Routes($_SERVER['REQUEST_URI']);
$route->getFile();

include_once "bottom.php";
