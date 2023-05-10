<?php
include_once '../Models/Product.php';
include_once '../Config/Connection.php';
include_once '../routes/route.php';

if ($_POST['tombol'] != "hapus") {
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $harga_b = $_POST['harga_b'];
  $harga_j = $_POST['harga_j'];
  $stok = $_POST['stok'];
  $min_stok = $_POST['min_stok'];
  $jenis_id = $_POST['jenis_id'];
  $data = [$kode, $nama, $harga_b, $harga_j, $stok, $min_stok, $jenis_id];
}

$Product = new Product();
switch ($_POST['tombol']) {
  case 'simpan':
    $Product->insert($data);
    break;
  case 'ubah':
    array_push($data, $_POST['id']);
    $Product->update($data);
    break;
  case 'hapus':
    unset($data);
    $id[] = $_POST['id'];
    $Product->delete($id);
    break;

  default:
    header('Location:/msib-dashboard/index.php');
    break;
}
header('Location:/msib-dashboard/index.php?page=products');
