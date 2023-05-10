<?php
include_once '../Models/Order.php';
include_once '../Config/Connection.php';
include_once '../routes/route.php';

if ($_POST['tombol'] != 'hapus') {
  $tgl = $_POST['tgl'];
  $total = $_POST['total'];
  $pelanggan_id = $_POST['pelanggan_id'];
  $data = [$tgl, $total, $pelanggan_id];
}

$Order = new Order();
switch ($_POST['tombol']) {
  case 'simpan':
    $Order->insert($data);
    break;
  case 'ubah':
    array_push($data, $_POST['id']);
    $Order->update($data);
    break;
  case 'hapus':
    unset($data);
    $id[] = $_POST['id'];
    $Order->delete($id);
    break;

  default:
    header('Location:/msib-dashboard/index.php');
    break;
}
header('Location:/msib-dashboard/index.php?page=orders');
