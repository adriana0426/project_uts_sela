<?php 
require_once "includes/db_connect.php"; 
include "includes/header.php";

$res = mysqli_query($conn, "SELECT * FROM tb_karyawan ORDER BY id_karyawan DESC");
?>
<div class="card">
  <div class="header-top">
    <h3>Daftar Karyawan</h3>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Tanggal Masuk</th>
        <th>Gaji Pokok</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td><?= htmlspecialchars($row['id_karyawan'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['nama'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['jabatan'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['alamat'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['no_hp'] ?? '') ?></td>
        <td><?= htmlspecialchars($row['tanggal_masuk'] ?? '') ?></td>
        <td>
          <?= 'Rp ' . number_format((float)($row['gaji_pokok'] ?? 0), 2, ',', '.') ?>
        </td>
        <td>
          <a class="btn ghost" href="karyawan-edit.php?id=<?= htmlspecialchars($row['id_karyawan'] ?? '') ?>">Edit</a>
          <form method="post" action="proses/karyawan-delete.php" style="display:inline" onsubmit="return confirm('Hapus karyawan?')">
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id_karyawan'] ?? '') ?>">
            <button class="btn ghost" type="submit">Hapus</button>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include "includes/footer.php"; ?>
