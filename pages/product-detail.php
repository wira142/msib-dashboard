<?php
include_once "Models/Product.php";
$product = new Product();
$data = $product->getProduct($_REQUEST['id']);

?>

<div class="container">
  <h1>Tambah Produk Baru</h1>
  <form action="/msib-dashboard/Controller/ProductController.php" method="POST">
    <input type="text" value="<?= $data['id'] ?>" hidden name="id">
    <div class="mb-3">
      <label for="kode" class="form-label">Kode Produk</label>
      <input type="text" class="form-control" id="kode" value="<?= $data['kode'] ?>" placeholder="TV001" name="kode">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" value="<?= $data['nama'] ?>" name="nama" placeholder="Pop Ice">
    </div>
    <div class="mb-3">
      <label for="hrg_bli" class="form-label">Harga Beli</label>
      <input type="number" class="form-control" id="hrg_bli" name="harga_b" value="<?= $data['harga_beli'] ?>" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="hrg_jual" class="form-label">Harga Jual</label>
      <input type="number" class="form-control" id="hrg_jual" value="<?= $data['harga_jual'] ?>" name="harga_j" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="stok" class="form-label">Stok</label>
      <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['stok'] ?>" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="min_stok" class="form-label">Min Stok</label>
      <input type="number" class="form-control" id="min_stok" name="min_stok" value="<?= $data['min_stok'] ?>" placeholder="100">
    </div>
    <div class="mb-3">
      <label for="jenis" class="form-label">Jenis Produk</label>
      <select name="jenis_id" class="form-control" id="jenis">
        <option value="2" <?= $data['jenis_produk_id'] == 2 ? 'selected' : '' ?>>Makanan</option>
        <option value="3" <?= $data['jenis_produk_id'] == 3 ? 'selected' : '' ?>>Minuman</option>
      </select>
    </div>
    <button type="submit" name="tombol" value="ubah" class="btn btn-success">Ubah</button>
    <br>
    <br>
  </form>
</div>