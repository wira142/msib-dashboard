<?php
include_once '../Models/Customer.php';
include_once '../Config/Connection.php';
include_once '../routes/route.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$diskon = $_POST['diskon'];
$iuran = $_POST['iuran'];

$data = [$kode, $nama, $jk, $tmp_lahir, $tgl_lahir, $email, $kartu_id];
$Customer = new Customer();
switch ($_POST['tombol']) {
  case 'simpan':
    $Customer->insert($data);
    break;
  case 'ubah':
    array_push($data, $_POST['id']);
    $Customer->update($data);
    break;

  default:
    header('Location:/msib-dashboard/index.php');
    break;
}
header('Location:/msib-dashboard/index.php?page=cards');
