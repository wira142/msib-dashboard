<?php
class Member
{
  private $con;
  public function __construct()
  {
    global $dbh;
    $this->con = $dbh;
  }
  public function cekLogin($data)
  {
    $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(MD5(?))";
    try {
      $ps = $this->con->prepare($sql);
      $ps->execute($data);
      $rs = $ps->fetch();
      return $rs;
    } catch (Exception $th) {
      echo $th->getMessage();
    }
  }
}
