<?php
include_once '../Models/Card.php';
include_once '../Config/Connection.php';
include_once '../routes/route.php';

if ($_POST['tombol'] != 'hapus') {
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $diskon = doubleval($_POST['diskon']) / 100;
  $iuran = floatval($_POST['iuran']);
  $data = [$kode, $nama, $diskon, $iuran];
}

$Card = new Card();
switch ($_POST['tombol']) {
  case 'simpan':
    $Card->insert($data);
    break;
  case 'ubah':
    array_push($data, $_POST['id']);
    $Card->update($data);
    break;
  case 'hapus':
    unset($data);
    $id[] = $_POST['id'];
    $Card->delete($id);
    break;

  default:
    header('Location:/msib-dashboard/index.php');
    break;
}
header('Location:/msib-dashboard/index.php?page=cards');
