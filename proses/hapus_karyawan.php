<?php
require_once __DIR__ . "/../includes/db_connect.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: ../index.php"); exit; }
$id = intval($_POST["id"] ?? 0);
if ($id <= 0) { header("Location: ../index.php"); exit; }
$stmt = mysqli_prepare($conn, "DELETE FROM tb_karyawan WHERE id_karyawan = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("Location: ../index.php");
exit;
?>
