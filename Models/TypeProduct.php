<?php
class TypeProduct
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getType()
  {
    $sql = "SELECT * FROM jenis_produk";
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
