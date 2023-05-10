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
  public function getProduct($id)
  {
    $sql = "SELECT * FROM produk WHERE produk.id = ?";
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
    $sql = "INSERT INTO produk(kode,nama,harga_beli,harga_jual,stok,min_stok,jenis_produk_id) VALUES(?,?,?,?,?,?,?)";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function delete($data)
  {
    $sql = "DELETE FROM produk WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function update($data)
  {
    $sql = "UPDATE produk SET kode = ?,nama = ?,harga_beli =?,harga_jual=?,stok=?,min_stok=?,jenis_produk_id=? WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
}
