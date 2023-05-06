<?php
$dbname = 'dbpos';
$dsn = 'mysql:dbname=' . $dbname . ';mysql:host=localhost';
$user = 'root';
$password = '';
try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $th) {
  echo $th->getMessage();
}
