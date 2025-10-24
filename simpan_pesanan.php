<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id_user'])) {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
  exit;
}

if (isset($_POST['konfirmasi'])) {
  $id_user = $_SESSION['id_user'];
  $tanggal = $_POST['tanggal'];
  $tipe = $_POST['tipe'];
  $dewasa = $_POST['dewasa'];
  $anak = $_POST['anak'];
  $total = $_POST['total'];
  $metode = $_POST['metode'];

  // Upload bukti pembayaran
  $target_dir = "uploads/";
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  $bukti = $_FILES['bukti']['name'];
  $tmp_name = $_FILES['bukti']['tmp_name'];
  $file_path = $target_dir . time() . "_" . basename($bukti);

  if (!empty($bukti)) {
    move_uploaded_file($tmp_name, $file_path);
  } else {
    $file_path = NULL;
  }

  // Simpan ke database
  $query = "INSERT INTO transaksi (id_user, tanggal, tipe, dewasa, anak, total, metode, bukti, status)
            VALUES ('$id_user', '$tanggal', '$tipe', '$dewasa', '$anak', '$total', '$metode', '$file_path', 'pending')";
  mysqli_query($conn, $query);

  echo "<script>alert('Pesanan berhasil dikonfirmasi dan disimpan! Silakan tunggu admin untuk verifikasi.'); window.location='riwayat.php';</script>";
  exit;
}
?>
