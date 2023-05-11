<?php
session_start();
include_once '../Models/Member.php';
include_once '../Config/Connection.php';
include_once '../routes/route.php';


switch ($_POST['tombol']) {
  case 'masuk':
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $data = [
      $uname,
      $pass
    ];

    $member = new Member();
    $cek = $member->cekLogin($data);
    if (!empty($cek)) {
      $_SESSION['MEMBER'] = $cek;
      header('location:/msib-dashboard/index.php');
    } else {
      echo "<script>alert('Akun tidak ditemukan!');history.back();</script>";
      // header('location:' . $_SERVER['HTTP_REFERER']);
    }
    break;
  case 'keluar':
    unset($_SESSION['MEMBER']);
    session_destroy();
    header('Location:/msib-dashboard/FE/member_login.php');
    break;
  default:
    header('Location:' . $_SERVER['HTTP_REFERER']);
    break;
}
