<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
  echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
  exit;
}

$id = $_GET['id'];
$status = $_GET['status'];

// Konversi agar sesuai ENUM di database
if ($status == 'acc') {
  $status = 'sukses';
} elseif ($status == 'tolak') {
  $status = 'rejected';
}

mysqli_query($conn, "UPDATE transaksi SET status='$status' WHERE id='$id'");

header("Location: dashboard_admin.php");
exit;
?>
