<div class="container-fluid px-4">
  <h1 class="my-4">Products</h1>
  <div class="card mb-4">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <span><i class="fas fa-table me-1"></i>
          Products</span>
        <a href="index.php?page=product-insert" class="btn btn-success">Add New</a>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Name</th>
            <th>Capital</th>
            <th>Selling Price</th>
            <th>Stock</th>
            <th>Min Stock</th>
            <th>Category</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Name</td>
            <td>Capital</td>
            <td>Selling Price</td>
            <td>Stock</td>
            <td>Min Stock</td>
            <td>Category</td>
            <td>option</td>
          </tr>
        </tfoot>
        <tbody>
          <?php
          include_once "Models/Product.php";
          $product = new Product();
          $data = $product->getProducts();
          foreach ($data as $key => $item) {
          ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $item['kode'] ?></td>
              <td><?= $item['nama'] ?></td>
              <td><?= $item['harga_beli'] ?></td>
              <td><?= $item['harga_jual'] ?></td>
              <td><?= $item['stok'] ?></td>
              <td><?= $item['min_stok'] ?></td>
              <td><?= $item['kategori'] ?></td>
              <td>
                <div class="d-flex gap-2">
                  <a href="index.php?page=product-detail&id=<?= $item['id'] ?>" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-memo-circle-info"></i></a>
                  <a href="index.php?page=product-update&id=<?= $item['id'] ?>" class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i></a>
                  <form action="/msib-dashboard/Controller/ProductController.php" method="POST">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit" name="tombol" value="hapus" class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fa-solid fa-trash"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>