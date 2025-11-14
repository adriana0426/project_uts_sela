<?php require_once "includes/db_connect.php"; include "includes/header.php";
$id = intval($_GET["id"] ?? 0); if ($id <= 0) { header("Location: index.php"); exit; }
$stmt = mysqli_prepare($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan=? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $id); mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt); $row = mysqli_fetch_assoc($res); mysqli_stmt_close($stmt);
if (!$row) { echo "<div class=\"card\">Data tidak ditemukan</div>"; include "includes/footer.php"; exit; }
?>
<div class="content card">
  <h3>Edit Karyawan</h3>
  <form method="post" action="proses/edit_karyawan.php" data-validate>
    <input type="hidden" name="id" value="<?= $row["id_karyawan"] ?>">
    <label>Nama <input name="nama" data-required data-label="Nama" value="<?= htmlspecialchars($row["nama"]) ?>"></label>
    <label>Jabatan <input name="jabatan" value="<?= htmlspecialchars($row["jabatan"]) ?>"></label>
    <label>No HP <input name="no_hp" value="<?= htmlspecialchars($row["no_hp"]) ?>"></label>
    <label>Tanggal Masuk <input type="date" name="tanggal_masuk" value="<?= $row["tanggal_masuk"] ?>"></label>
    <label>Gaji Pokok <input name="gaji_pokok" data-numeric data-label="Gaji Pokok" value="<?= $row["gaji_pokok"] ?>"></label>
    <div style="margin-top:10px">
      <button class="btn">Simpan Perubahan</button>
      <a class="btn ghost" href="index.php">Batal</a>
    </div>
  </form>
</div>
<?php include "includes/footer.php"; ?>
