<?php
require_once __DIR__ . "/../includes/db_connect.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: ../index.php"); exit; }

$id = intval($_POST["id"] ?? 0);
$nama = trim($_POST["nama"] ?? "");
$jabatan = trim($_POST["jabatan"] ?? "");
$alamat = trim($_POST["alamat"] ?? "");
$no_hp = trim($_POST["no_hp"] ?? "");
$tanggal_masuk = $_POST["tanggal_masuk"] ?? null;
$gaji_pokok = $_POST["gaji_pokok"] ?? 0;

$errors = [];
if ($id <= 0) $errors[] = "ID tidak valid.";
if ($nama === "") $errors[] = "Nama harus diisi.";
if ($gaji_pokok !== "" && !is_numeric($gaji_pokok)) $errors[] = "Gaji pokok harus angka.";
if (!empty($errors)) {
    $err = urlencode(implode(" | ", $errors));
    header("Location: ../edit.php?id={$id}&error={$err}");
    exit;
}

$stmt = mysqli_prepare($conn, "UPDATE tb_karyawan SET nama=?, jabatan=?, no_hp=?, tanggal_masuk=?, gaji_pokok=? WHERE id_karyawan=?");
mysqli_stmt_bind_param($stmt, "ssssdi", $nama, $jabatan,$alamat, $no_hp, $tanggal_masuk, $gaji_pokok, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("Location: ../index.php");
exit;
?>
