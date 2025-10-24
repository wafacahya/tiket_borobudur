<?php
session_start();
include 'koneksi.php';

// Pastikan user login
if (!isset($_SESSION['id_user'])) {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
  exit;
}

$id_user = $_SESSION['id_user'];
$id_transaksi = $_GET['id'];

// Ambil data transaksi untuk form konfirmasi
$query = "SELECT * FROM transaksi WHERE id = '$id_transaksi' AND id_user = '$id_user'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$data) {
  echo "<script>alert('Transaksi tidak ditemukan!'); window.location='riwayat.php';</script>";
  exit;
}

// Jika form disubmit
if (isset($_POST['konfirmasi'])) {
  $catatan = mysqli_real_escape_string($conn, $_POST['catatan']);
  mysqli_query($conn, "UPDATE transaksi SET status='selesai' WHERE id='$id_transaksi'");
  
  echo "<script>alert('Terima kasih! Pesanan Anda telah dikonfirmasi.'); window.location='riwayat.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold" href="#">InJourney Destinations</a>
</nav>

<div class="container mt-5">
  <div class="card p-4 shadow-sm">
    <h4 class="text-success fw-bold mb-3">Konfirmasi Pesanan Anda</h4>

    <p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($data['tanggal']) ?></p>
    <p><strong>Tipe Tiket:</strong> <?= ucfirst($data['tipe']) ?></p>
    <p><strong>Total Pembayaran:</strong> IDR <?= number_format($data['total'], 0, ',', '.') ?></p>

    <form method="POST">
      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan (opsional)</label>
        <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Tulis pengalaman Anda..."></textarea>
      </div>
      <button type="submit" name="konfirmasi" class="btn btn-success">Konfirmasi Pesanan</button>
      <a href="riwayat.php" class="btn btn-secondary ms-2">Kembali</a>
    </form>
  </div>
</div>

</body>
</html>
