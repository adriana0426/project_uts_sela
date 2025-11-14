<?php  
require_once __DIR__ . "/../includes/db_connect.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: ../gaji-list.php");
  exit;
}

// Ambil ID gaji yang dikirim
$id = intval($_POST["id"] ?? 0);

// Jika ID tidak valid, kembali ke daftar
if ($id <= 0) {
  header("Location: ../gaji-list.php");
  exit;
}

// Hapus data gaji dari database
$stmt = mysqli_prepare($conn, "DELETE FROM tb_gaji WHERE id_gaji = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Kembali ke halaman daftar gaji
header("Location: ../gaji-list.php");
exit;
?>
