<div class="container">
  <h1>Tambah Pelanggan Baru</h1>
  <form action="/msib-dashboard/Controller/CustomerController.php" method="POST">
    <div class="mb-3">
      <label for="kode" class="form-label">Kode</label>
      <input type="text" class="form-control" id="kode" placeholder="100202" name="kode">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Tatang">
    </div>
    <div class="mb-3">
      <label for="jk" class="form-label">Jenis Kelamin</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jk" value="L" id="jk1">
        <label class="form-check-label" for="jk1">
          Laki-Laki
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jk" value="P" id="jk2" checked>
        <label class="form-check-label" for="jk2">
          Perempuan
        </label>
      </div>
    </div>
    <div class="mb-3">
      <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Bandung">
    </div>
    <div class="mb-3">
      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="01/01/2001">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="xxxxxxx@xxxx.xxx">
    </div>
    <div class="mb-3">
      <label for="kartu" class="form-label">Jenis Kartu</label>
      <select name="kartu_id" class="form-control" id="kartu">
        <option value="1">Gold</option>
        <option value="2">Silver</option>
      </select>
    </div>
    <button type="submit" name="tombol" value="simpan" class="btn btn-success">Simpan</button>
    <br>
    <br>
  </form>
</div>