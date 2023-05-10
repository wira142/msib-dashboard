<?php
include_once "Models/Order.php";
$Order = new Order();
$data = $Order->getOrder($_REQUEST['id']);
?>

<div class="container">
  <h1>Data Kartu</h1>
  <form>
    <input type="text" name="id" hidden value="<?= $data['id'] ?>">
    <div class="mb-3">
      <label for="tgl" class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tgl" value="<?= $data['tanggal'] ?>" placeholder="1003" name="tgl">
    </div>
    <div class="mb-3">
      <label for="total" class="form-label">Total</label>
      <input type="number" min="0" class="form-control" id="total" value="<?= $data['total'] ?>" name="total" placeholder="1000">
    </div>
    <div class="mb-3">
      <label for="pelanggan_id" class="form-label">ID Pelanggan</label>
      <input type="number" step="1" min="0" class="form-control" value="<?= $data['pelanggan_id'] ?>" id="pelanggan_id" name="pelanggan_id" placeholder="50">
    </div>
    <br>
    <br>
  </form>
</div>