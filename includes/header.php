<?php
// includes/header.php - Header dan Sidebar
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="app">
  <aside class="sidebar">
    <div>
      <!-- Bagian Brand / Logo -->
      <div class="brand">
        <div class="logo-wrapper">
         
          <img src="assets/img/logo.png" class="logo-small" alt="Logo Sistem Karyawan">
        </div>
        <div class="brand-text">
          <div class="brand-title">PT Cipta Media</div>
          <div class="brand-sub">Sistem Manajemen Karyawan</div>
        </div>
      </div>

      <!-- Navigasi Sidebar -->
      <nav class="navs">
        <a class="nav-link" href="index.php">Beranda</a>
        <a class="nav-link" href="karyawan-list.php">Daftar Karyawan</a>
        <a class="nav-link" href="karyawan-input.php">Tambah Karyawan</a>
        <a class="nav-link" href="gaji-list.php">Gaji</a>
      </nav>
    </div>

    <!-- Footer Sidebar -->
    <div class="sidebar-footer">Halo, Administrator PT Cipta Media</div>
  </aside>

  <!-- Awal Main Content -->
  <main class="main-area">
