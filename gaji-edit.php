<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "includes/db_connect.php";
include "includes/header.php";

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
  header("Location: gaji-list.php");
  exit;
}

$sql = "SELECT g.*, k.nama AS nama_karyawan
        FROM tb_gaji g
        LEFT JOIN tb_karyawan k ON g.id_karyawan = k.id_karyawan
        WHERE g.id_gaji = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die("Query error: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
  echo '<div class="card">Data gaji dengan ID tersebut tidak ditemukan.</div>';
  include "includes/footer.php";
  exit;
}
?>

<div class="card">
  <h3>Edit Gaji</h3>
  <form method="post" action="proses/proses-gaji-edit.php">
    <input type="hidden" name="id_gaji" value="<?= htmlspecialchars($row['id_gaji']) ?>">

    <label>Nama Karyawan</label>
    <input type="text" value="<?= htmlspecialchars($row['nama_karyawan']) ?>" disabled>

    <label>Bulan</label>
    <input type="text" name="bulan" value="<?= htmlspecialchars($row['bulan']) ?>" required>

    <label>Tahun</label>
    <input type="number" name="tahun" value="<?= htmlspecialchars($row['tahun']) ?>" required>

    <label>Total Gaji</label>
    <input type="number" name="total_gaji" value="<?= htmlspecialchars($row['total_gaji']) ?>" required>

    <div style="margin-top:10px">
      <button class="btn" type="submit">Simpan</button>
      <a class="btn ghost" href="gaji-list.php">Batal</a>
    </div>
  </form>
</div>

<?php include "includes/footer.php"; ?>
