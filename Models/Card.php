<?php
class Card
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getCards()
  {
    $sql = "SELECT * FROM kartu";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute();
      $rs = $ps->fetchAll();
      return $rs;
    } catch (Exception $th) {
      throw $th->getMessage();
    }
  }
  public function getCard($id)
  {
    $sql = "SELECT * FROM kartu WHERE id = ?";
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
    $sql = "INSERT INTO kartu(kode,nama,diskon,iuran) VALUES(?,?,?,?)";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
  public function update($data)
  {
    $sql = "UPDATE kartu SET kode = ?,nama = ?,diskon=?,iuran =? WHERE id = ?";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
}
