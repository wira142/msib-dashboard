<?php
class Customer
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getCustomers()
  {
    $sql = "SELECT pelanggan.*,kartu.nama as kartu FROM pelanggan LEFT JOIN kartu ON pelanggan.kartu_id = kartu.id";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute();
      $rs = $ps->fetchAll();
      return $rs;
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function getCustomer($id)
  {
    $sql = "SELECT * FROM pelanggan WHERE id = ?";
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
    $sql = "INSERT INTO pelanggan(kode,nama_pelanggan,jk,tmp_lahir,tgl_lahir,email,kartu_id) VALUES(?,?,?,?,?,?,?)";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function delete($data)
  {
    $sql = "DELETE FROM pelanggan WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function update($data)
  {
    $sql = "UPDATE pelanggan SET kode = ?,nama_pelanggan = ?,jk=?,tmp_lahir =?,tgl_lahir=?,email=?,kartu_id=?WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
}
