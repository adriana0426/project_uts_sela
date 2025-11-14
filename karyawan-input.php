<?php
require_once "includes/db_connect.php";
include "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = $_POST["nama"];
  $jabatan = $_POST["jabatan"];
  $alamat = $_POST["alamat"];
  $no_hp = $_POST["no_hp"];
  $tanggal_masuk = $_POST["tanggal_masuk"];
  $gaji = (float)$_POST["gaji_pokok"];

  $stmt = mysqli_prepare($conn, "INSERT INTO tb_karyawan (nama, jabatan, alamat, no_hp, tanggal_masuk, gaji_pokok) VALUES (?, ?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sssssd", $nama, $jabatan, $alamat, $no_hp, $tanggal_masuk, $gaji);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: karyawan-list.php");
  exit;
}
?>
<div class="card">
  <h3>Tambah Karyawan</h3>
  <form method="post">
    <label>Nama <input name="nama" required></label>
    <label>Jabatan <input name="jabatan"></label>
    <label>Alamat <input name="alamat"></label>
    <label>No HP <input name="no_hp"></label>
    <label>Tanggal Masuk <input name="tanggal_masuk" type="date"></label>
    <label>Gaji Pokok <input name="gaji_pokok" type="number" step="1"></label>
    <div style="margin-top:10px">
      <button class="btn" type="submit">Simpan</button>
      <a class="btn ghost" href="karyawan-list.php">Batal</a>
    </div>
  </form>
</div>
<?php include "includes/footer.php"; ?>
