<?php
require_once "includes/db_connect.php";
include "includes/header.php";

$sql = "SELECT g.*, k.nama as nama_k
        FROM tb_gaji g
        LEFT JOIN tb_karyawan k ON k.id_karyawan=g.id_karyawan
        ORDER BY g.id_gaji DESC";
$rows = mysqli_query($conn, $sql);
?>
<div class="content card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h3>Daftar Gaji</h3>
    <a class="btn" href="gaji-input.php">Tambah Gaji</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Karyawan</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Total</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($r = mysqli_fetch_assoc($rows)): ?>
      <tr>
        <td><?= htmlspecialchars($r["id_gaji"]) ?></td>

        <!-- Nama safe -->
        <td><?= htmlspecialchars($r["nama_k"] ?? '-') ?></td>

        <td><?= htmlspecialchars($r["bulan"] ?? '-') ?></td>
        <td><?= htmlspecialchars($r["tahun"] ?? '-') ?></td>

        
        <?php
          // ambil nilai total_gaji; jika tidak ada, fallback ke 0
          $total_raw = $r['total_gaji'] ?? $r['gaji_pokok'] ?? 0;
          // pastikan numeric
          $total_num = is_numeric($total_raw) ? (float)$total_raw : 0.0;
          // format rupiah
          $total_formatted = 'Rp ' . number_format($total_num, 2, ',', '.');
        ?>
        <td><?= $total_formatted ?></td>

        <td>
          <a class="btn ghost" href="gaji-edit.php?id=<?= htmlspecialchars($r["id_gaji"]) ?>">Edit</a>
          <form method="post" action="proses/proses-gaji-delete.php" style="display:inline" onsubmit="return confirm('Hapus data gaji?')">
            <input type="hidden" name="id" value="<?= htmlspecialchars($r["id_gaji"]) ?>">
            <button class="btn ghost">Hapus</button>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php include "includes/footer.php"; ?>
