<?php
include_once '../Models/Customer.php';
include_once '../Config/Connection.php';
include_once '../routes/route.php';

if ($_POST['tombol'] != 'hapus') {
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $tmp_lahir = $_POST['tmp_lahir'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $email = $_POST['email'];
  $kartu_id = $_POST['kartu_id'];
  $data = [$kode, $nama, $jk, $tmp_lahir, $tgl_lahir, $email, $kartu_id];
}

$Customer = new Customer();
switch ($_POST['tombol']) {
  case 'simpan':
    $Customer->insert($data);
    break;
  case 'ubah':
    array_push($data, $_POST['id']);
    $Customer->update($data);
    break;
  case 'hapus':
    unset($data);
    $id[] = $_POST['id'];
    $Customer->delete($id);
    break;

  default:
    header('Location:/msib-dashboard/index.php');
    break;
}
header('Location:/msib-dashboard/index.php?page=customers');
