<div class="container-fluid px-4">
  <h1 class="my-4">Cards</h1>
  <div class="card mb-4">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <span><i class="fas fa-table me-1"></i>
          Cards</span>
        <?php
        if ($_SESSION['MEMBER']['role'] == "admin") {
        ?>
          <a href="index.php?page=card-insert" class="btn btn-success">Add New</a>
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
            <th>Code</th>
            <th>Name</th>
            <th>Discount</th>
            <th>Dues</th>
            <th>Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td>No</td>
            <td>Code</td>
            <td>Name</td>
            <td>Discount</td>
            <td>Dues</td>
            <td>option</td>
          </tr>
        </tfoot>
        <tbody>
          <?php
          include_once "Models/Card.php";
          $product = new Card();
          $data = $product->getCards();
          foreach ($data as $key => $item) {
          ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $item['kode'] ?></td>
              <td><?= $item['nama'] ?></td>
              <td><?= ($item['diskon'] * 100) . '%' ?></td>
              <td><?= "Rp." . $item['iuran'] ?></td>
              <td>
                <div class="d-flex gap-2">
                  <a href="index.php?page=card-detail&id=<?= $item['id'] ?>" class="btn btn-outline-info"><i class="fa-sharp fa-solid fa-memo-circle-info"></i></a>
                  <?php
                  if ($_SESSION['MEMBER']['role'] == "admin") {
                  ?>
                    <a href="index.php?page=card-update&id=<?= $item['id'] ?>" class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i></a>
                    <form action="/msib-dashboard/Controller/CardController.php" method="POST">
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