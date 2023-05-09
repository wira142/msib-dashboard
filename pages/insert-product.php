<div class="container">
  <h1>Tambah Produk Baru</h1>
  <form action="/msib-dashboard/Controller/ProductController.php" method="POST">
    <div class="mb-3">
      <label for="kode" class="form-label">Kode Produk</label>
      <input type="text" class="form-control" id="kode" placeholder="TV001" name="kode">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Pop Ice">
    </div>
    <div class="mb-3">
      <label for="hrg_bli" class="form-label">Harga Beli</label>
      <input type="number" class="form-control" id="hrg_bli" name="harga_b" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="hrg_jual" class="form-label">Harga Jual</label>
      <input type="number" class="form-control" id="hrg_jual" name="harga_j" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="stok" class="form-label">Stok</label>
      <input type="number" class="form-control" id="stok" name="stok" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="min_stok" class="form-label">Min Stok</label>
      <input type="number" class="form-control" id="min_stok" name="min_stok" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="jenis" class="form-label">Jenis Produk</label>
      <select name="jenis_id" class="form-control" id="jenis">
        <option value="2">Makanan</option>
        <option value="3">Minuman</option>
      </select>
    </div>
    <button type="submit" name="tombol" value="simpan" class="btn btn-success">Simpan</button>
    <br>
    <br>
  </form>
</div>