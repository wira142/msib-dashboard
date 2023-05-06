<?php
class Customer
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getCustomer()
  {
    $sql = "SELECT pelanggan.*,kartu.nama as kartu FROM pelanggan LEFT JOIN kartu ON pelanggan.kartu_id = kartu.id";
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
