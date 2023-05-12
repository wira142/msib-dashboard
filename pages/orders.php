<div class="container-fluid px-4">
  <h1 class="my-4">Order</h1>
  <div class="card mb-4">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <span><i class="fas fa-table me-1"></i>
          Orders</span>
        <?php
        if ($_SESSION['MEMBER']['role'] == "admin") {
        ?>
          <a href="index.php?page=order-insert" class="btn btn-success">Add New</a>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>Total</th>
            <th>Code Customer</th>
            <th>Customer</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td>No</td>
            <td>Date</td>
            <td>Total</td>
            <td>Code Customer</td>
            <td>Customer</td>
            <td>option</td>
          </tr>
        </tfoot>
        <tbody>
          <?php
          include_once "Models/Order.php";
          $product = new Order();
          $data = $product->getOrders();
          foreach ($data as $key => $item) {
          ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $item['tanggal'] ?></td>
              <td><?= $item['total'] ?></td>
              <td><?= $item['kode'] ?></td>
              <td><?= $item['nama'] ?></td>
              <td>
                <div class="d-flex gap-2">
                  <a href="index.php?page=order-detail&id=<?= $item['id'] ?>" class="btn btn-outline-info">
                    <i class="fa-sharp fa-solid fa-memo-circle-info"></i>
                  </a>
                  <?php
                  if ($_SESSION['MEMBER']['role'] == "admin") {
                  ?>
                    <a href="index.php?page=order-update&id=<?= $item['id'] ?>" class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i></a>
                    <form action="/msib-dashboard/Controller/OrderController.php" method="POST">
                      <input type="hidden" name="id" value="<?= $item['id'] ?>">
                      <button type="submit" name="tombol" value="hapus" class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  <?php
                  }
                  ?>
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