<?php
include "../includes/db_connect.php";

$id_karyawan = $_POST['id_karyawan'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$total_gaji = $_POST['total_gaji'];

// Pastikan semua data diisi
if ($id_karyawan && $bulan && $tahun && $total_gaji) {
  $stmt = mysqli_prepare($conn, 
    "INSERT INTO tb_gaji (id_karyawan, bulan, tahun, total_gaji) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "issi", $id_karyawan, $bulan, $tahun, $total_gaji);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

header("Location: ../gaji-list.php");
exit;
?>
