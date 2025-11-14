-- db_karyawan.sql
CREATE DATABASE IF NOT EXISTS db_karyawan;
USE db_karyawan;

CREATE TABLE IF NOT EXISTS tb_karyawan (
  id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(200) NOT NULL,
  jabatan VARCHAR(100),
  no_hp VARCHAR(30),
  tanggal_masuk DATE DEFAULT NULL,
  gaji_pokok INT DEFAULT 0
);

INSERT INTO tb_karyawan (nama,jabatan,no_hp,tanggal_masuk,gaji_pokok) VALUES
("Andi Setiawan","Staff IT","08123456789","2022-02-01",4500000),
("Siti Rahma","Administrasi","08234567890","2021-05-10",4000000);
