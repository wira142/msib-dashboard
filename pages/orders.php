<div class="container-fluid px-4">
  <h1 class="my-4">Order</h1>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Order
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
          $data = $product->getOrder();
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
                  <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i></a>
                  <a href="#" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
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