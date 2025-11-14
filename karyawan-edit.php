<?php
require_once "includes/db_connect.php";
include "includes/header.php";

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
  header("Location: karyawan-list.php");
  exit;
}

// Ambil data lama
$stmt = mysqli_prepare($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
  echo "<div class='card'>Data karyawan tidak ditemukan.</div>";
  include "includes/footer.php";
  exit;
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = $_POST["nama"];
  $jabatan = $_POST["jabatan"];
  $alamat = $_POST["alamat"];
  $no_hp = $_POST["no_hp"];
  $tanggal_masuk = $_POST["tanggal_masuk"];
  $gaji_pokok = (float)$_POST["gaji_pokok"];

 
  $stmt = mysqli_prepare($conn, "UPDATE tb_karyawan 
                                 SET nama=?, jabatan=?, alamat=?, no_hp=?, tanggal_masuk=?, gaji_pokok=? 
                                 WHERE id_karyawan=?");
  mysqli_stmt_bind_param($stmt, "ssssssi", 
    $nama, 
    $jabatan, 
    $alamat, 
    $no_hp, 
    $tanggal_masuk, 
    $gaji_pokok, 
    $id
  );
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: karyawan-list.php");
  exit;
}
?>

<div class="card">
  <h3>Edit Karyawan</h3>
  <form method="post">
    <label>Nama
      <input name="nama" value="<?= htmlspecialchars($row['nama'] ?? '') ?>" required>
    </label>
    <label>Jabatan
      <input name="jabatan" value="<?= htmlspecialchars($row['jabatan'] ?? '') ?>">
    </label>
    <label>Alamat
      <input name="alamat" value="<?= htmlspecialchars($row['alamat'] ?? '') ?>">
    </label>
    <label>No HP
      <input name="no_hp" value="<?= htmlspecialchars($row['no_hp'] ?? '') ?>">
    </label>
    <label>Tanggal Masuk
      <input type="date" name="tanggal_masuk" value="<?= htmlspecialchars($row['tanggal_masuk'] ?? '') ?>">
    </label>
    <label>Gaji Pokok
      <input name="gaji_pokok" type="number" step="1" value="<?= htmlspecialchars($row['gaji_pokok'] ?? 0) ?>">
    </label>
    <div style="margin-top:10px">
      <button class="btn" type="submit">Simpan Perubahan</button>
      <a class="btn ghost" href="karyawan-list.php">Batal</a>
    </div>
  </form>
</div>

<?php include "includes/footer.php"; ?>
