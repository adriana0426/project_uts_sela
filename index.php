<?php require_once "includes/db_connect.php"; include "includes/header.php"; ?>
<div class="card">
  <div class="header-top">
    <div class="page-title">Sistem Karyawan PT Cipta Media</div>
  </div>
  <div class="card" style="margin-top:14px">
    <h3>Selamat Datang!</h3>
    <p>Dashboard Sistem Manajemen Karyawan PT Cipta Media.
    Melalui sistem ini, Anda dapat menambah, mengedit, dan memantau seluruh data karyawan secara efisien.</p>
    <div style="margin-top:12px">
      <a class="btn" href="karyawan-input.php">Tambah Karyawan</a>
      <a class="btn" href="karyawan-list.php">Lihat Daftar Karyawan</a>
      <a class="btn" href="gaji-list.php">Gaji</a>
    </div>
  </div>
</div>
<?php include "includes/footer.php"; ?>
