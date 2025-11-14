<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connect.php";

$id_gaji    = intval($_POST['id_gaji'] ?? 0);
$id_karyawan= intval($_POST['id_karyawan'] ?? 0);
$bulan      = trim($_POST['bulan'] ?? ($_POST['bulan_input'] ?? ''));
$tahun      = intval($_POST['tahun'] ?? 0);


$total_raw  = $_POST['total_gaji'] ?? $_POST['gaji_pokok'] ?? null;
$total_gaji = null;

if ($total_raw !== null && $total_raw !== '') {
    $raw = trim((string)$total_raw);


    $clean = preg_replace('/[^\d,\.]/', '', $raw);

   
    if (strpos($clean, ',') !== false && strpos($clean, '.') !== false) {
        $clean = str_replace('.', '', $clean);  // hapus titik ribuan
        $clean = str_replace(',', '.', $clean); // ubah koma ke titik desimal
    }

    elseif (strpos($clean, '.') !== false && strpos($clean, ',') === false) {
        $clean = str_replace('.', '', $clean);
    }
    elseif (strpos($clean, ',') !== false) {
        $clean = str_replace(',', '.', $clean);
    }

    $total_gaji = is_numeric($clean) ? (float)$clean : 0.0;
}


if ($id_gaji <= 0 && $id_karyawan <= 0) {
    header("Location: ../gaji-list.php");
    exit;
}

// Jika update di tb_gaji (ada id_gaji), update record tb_gaji
if ($id_gaji > 0) {
   
    if ($bulan === '' || $tahun <= 0 || $total_gaji === null) {
        header("Location: ../gaji-edit.php?id=" . $id_gaji);
        exit;
    }

    $stmt = mysqli_prepare($conn, "UPDATE tb_gaji SET bulan = ?, tahun = ?, total_gaji = ? WHERE id_gaji = ?");
    if (!$stmt) {
        // debug safe fallback
        error_log("Prepare failed: " . mysqli_error($conn));
        header("Location: ../gaji-edit.php?id=" . $id_gaji);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "sidi", $bulan, $tahun, $total_gaji, $id_gaji);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../gaji-list.php");
    exit;
}

// Jika update langsung di tb_karyawan (tidak ada tb_gaji entry)
if ($id_karyawan > 0) {
    if ($total_gaji === null) {
        header("Location: ../gaji-edit.php?id=" . $id_karyawan);
        exit;
    }

    $stmt2 = mysqli_prepare($conn, "UPDATE tb_karyawan SET gaji_pokok = ? WHERE id_karyawan = ?");
    if (!$stmt2) {
        error_log("Prepare failed: " . mysqli_error($conn));
        header("Location: ../gaji-edit.php?id=" . $id_karyawan);
        exit;
    }

    mysqli_stmt_bind_param($stmt2, "di", $total_gaji, $id_karyawan);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    header("Location: ../gaji-list.php");
    exit;
}

// fallback
header("Location: ../gaji-list.php");
exit;
