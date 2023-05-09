<div class="container">
  <h1>Tambah Kartu Baru</h1>
  <form action="/msib-dashboard/Controller/OrderController.php" method="POST">
    <div class="mb-3">
      <label for="tgl" class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tgl" placeholder="1003" name="tgl">
    </div>
    <div class="mb-3">
      <label for="total" class="form-label">Total</label>
      <input type="number" min="0" class="form-control" id="total" name="total" placeholder="1000">
    </div>
    <div class="mb-3">
      <label for="pelanggan_id" class="form-label">ID Pelanggan</label>
      <input type="number" step="1" min="0" class="form-control" id="pelanggan_id" name="pelanggan_id" placeholder="50">
    </div>
    <button type="submit" name="tombol" value="simpan" class="btn btn-success">Simpan</button>
    <br>
    <br>
  </form>
</div>