<?php
class Card
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function getCard()
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
}
