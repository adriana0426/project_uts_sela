<?php require_once "../includes/db_connect.php";
$id = intval($_POST["id"] ?? 0);
if ($id > 0) {
  $stmt = mysqli_prepare($conn,"DELETE FROM tb_karyawan WHERE id_karyawan=?");
  mysqli_stmt_bind_param($stmt,"i",$id); mysqli_stmt_execute($stmt); mysqli_stmt_close($stmt);
}
header("Location: ../karyawan-list.php"); exit;
