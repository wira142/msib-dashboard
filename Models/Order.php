<?php
class Order
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getOrders()
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
  public function getOrder($id)
  {
    $sql = "SELECT * FROM pesanan WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute([$id]);
      $rs = $ps->fetch();
      return $rs;
    } catch (Exception $th) {
      throw $th->getMessage();
    }
  }
  public function insert($data)
  {
    $sql = "INSERT INTO pesanan(tanggal,total,pelanggan_id) VALUES(?,?,?)";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function update($data)
  {
    $sql = "UPDATE pesanan SET tanggal = ?,total = ?,pelanggan_id=? WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
}
