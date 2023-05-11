<?php
session_start();
if (!isset($_SESSION['MEMBER'])) {
  echo "<script>alert('Akun tidak memiliki akses!');window.location.href = '/msib-dashboard/FE/member_login.php';</script>";
} else if ($_SESSION['MEMBER']['role'] != 'admin') {
  unset($_SESSION['MEMBER']);
  session_destroy();
  echo "<script>alert('Akun tidak memiliki akses!');window.location.href = '/msib-dashboard/FE/member_login.php';</script>";
}
include_once "top.php";
include_once "menu.php";
include_once "Config/Connection.php";
include "routes/route.php";

$route = new Routes($_SERVER['REQUEST_URI']);
$route->getFile();

include_once "bottom.php";
