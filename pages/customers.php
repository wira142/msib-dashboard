<div class="container-fluid px-4">
  <h1 class="my-4">Customers</h1>
  <div class="card mb-4">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <span><i class="fas fa-table me-1"></i>
          Customers</span>
        <a href="index.php?page=customer-insert" class="btn btn-success">Add New</a>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birth Place</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Card</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Birth Place</td>
            <td>Birthday</td>
            <td>Email</td>
            <td>Card</td>
            <td>option</td>
          </tr>
        </tfoot>
        <tbody>
          <?php
          include_once 'Models/Customer.php';
          $customer = new Customer();
          $data = $customer->getCustomers();
          foreach ($data as $key => $item) {
          ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $item['kode'] ?></td>
              <td><?= $item['nama_pelanggan'] ?></td>
              <td><?= $item['jk'] ?></td>
              <td><?= $item['tmp_lahir'] ?></td>
              <td><?= $item['tgl_lahir'] ?></td>
              <td><?= $item['email'] ?></td>
              <td><?= $item['kartu'] ?></td>
              <td>
                <div class="d-flex gap-2">
                  <a href="index.php?page=customer-detail&id=<?= $item['id'] ?>" class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i></a>
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