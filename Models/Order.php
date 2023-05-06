<?php
class Order
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getOrder()
  {
    $sql = "SELECT pesanan.*,pelanggan.nama_pelanggan as nama,pelanggan.kode as kode FROM pesanan LEFT JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute();
      $rs = $ps->fetchAll();
      return $rs;
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
}
