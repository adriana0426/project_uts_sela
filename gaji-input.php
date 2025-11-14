<?php
include "includes/db_connect.php";
include "includes/header.php";
?>

<div class="card">
  <h3>Tambah Gaji</h3>

  <form method="post" action="proses/proses-gaji-input.php">
  <label>Karyawan
    <select name="id_karyawan" required>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM tb_karyawan ORDER BY nama ASC");
      while($r = mysqli_fetch_assoc($res)) {
        echo "<option value='{$r['id_karyawan']}'>{$r['nama']}</option>";
      }
      ?>
    </select>
  </label>

  <label>Bulan <input type="text" name="bulan" required></label>
  <label>Tahun <input type="number" name="tahun" value="<?= date('Y') ?>" required></label>
  <label>Total Gaji <input type="number" name="total_gaji" step="1" required></label>

  <div style="margin-top:10px">
    <button class="btn" type="submit">Simpan</button>
    <a class="btn ghost" href="gaji-list.php">Batal</a>
  </div>
</form>

</div>

<?php include "includes/footer.php"; ?>
