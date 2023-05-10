<?php
include_once "Models/Card.php";
$card = new Card();
$data = $card->getCard($_REQUEST['id']);
?>
<div class="container">
  <h1>Data Kartu</h1>
  <form>
    <input type="text" hidden value="<?= $data['id'] ?>" name="id">
    <div class="mb-3">
      <label for="kode" class="form-label">Kode</label>
      <input type="text" class="form-control" id="kode" value="<?= $data['kode'] ?>" placeholder="1003" name="kode">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="Gold">
    </div>
    <div class="mb-3">
      <label for="diskon" class="form-label">Diskon(%)</label>
      <input type="number" step="1" min="0" max="100" class="form-control" value="<?= $data['diskon'] * 100 ?>" id="diskon" name="diskon" placeholder="50">
    </div>
    <div class="mb-3">
      <label for="iuran" class="form-label">Iuran</label>
      <input type="number" min="0" step="10000" value="<?= $data['iuran'] ?>" class="form-control" id="iuran" name="iuran" placeholder="1000">
    </div>
    <br>
    <br>
  </form>
</div>