<div class="container">
  <h1>Tambah Kartu Baru</h1>
  <form action="/msib-dashboard/Controller/CardController.php" method="POST">
    <div class="mb-3">
      <label for="kode" class="form-label">Kode</label>
      <input type="text" class="form-control" id="kode" placeholder="1003" name="kode">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Gold">
    </div>
    <div class="mb-3">
      <label for="diskon" class="form-label">Diskon(%)</label>
      <input type="number" step="1" min="0" max="100" class="form-control" id="diskon" name="diskon" placeholder="50">
    </div>
    <div class="mb-3">
      <label for="iuran" class="form-label">Iuran</label>
      <input type="number" min="0" step="10000" class="form-control" id="iuran" name="iuran" placeholder="1000">
    </div>
    <button type="submit" name="tombol" value="simpan" class="btn btn-success">Simpan</button>
    <br>
    <br>
  </form>
</div>