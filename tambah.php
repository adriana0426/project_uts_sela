<?php require_once "includes/db_connect.php"; include "includes/header.php"; ?>
<div class="content card">
  <h3>Tambah Karyawan</h3>
  <form method="post" action="proses/tambah_karyawan.php" data-validate>
    <label>Nama <input name="nama" data-required data-label="Nama"></label>
    <label>Jabatan <input name="jabatan"></label>
    <label>Alamat <input name="alamat"></label>
    <label>No HP <input name="no_hp"></label>
    <label>Tanggal Masuk <input type="date" name="tanggal_masuk"></label>
    <label>Gaji Pokok <input name="gaji_pokok" data-numeric data-label="Gaji Pokok"></label>
    <div style="margin-top:10px">
      <button class="btn">Simpan</button>
      <a class="btn ghost" href="index.php">Batal</a>
    </div>
  </form>
</div>
<?php include "includes/footer.php"; ?>
