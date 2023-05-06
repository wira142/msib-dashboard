<?php
class Product
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getProducts()
  {
    $sql = "SELECT produk.*,jenis_produk.nama as kategori FROM produk INNER JOIN jenis_produk ON jenis_produk.id = produk.jenis_produk_id";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute();
      $rs = $ps->fetchAll();
      return $rs;
    } catch (Exception $th) {
      throw $th->getMessage();
    }
  }
}
