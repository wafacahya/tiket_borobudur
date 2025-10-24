<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id_user'])) {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: tiket.php");
  exit;
}

$id_user = $_SESSION['id_user'];
$tanggal = $_POST['tanggal'];
$tipe = $_POST['tipe'];
$dewasa = $_POST['dewasa'];
$anak = $_POST['anak'];
$metode = $_POST['metode'];

// Hitung total
$hargaDewasa = ($tipe == 'mancanegara') ? 350000 : 50000;
$hargaAnak = ($tipe == 'mancanegara') ? 150000 : 25000;
$subtotal = ($dewasa * $hargaDewasa) + ($anak * $hargaAnak);
$fee = 5000;
$total = $subtotal + $fee;

// Nomor pesanan simulasi
$order_id = strtoupper("ORD-" . rand(10000,99999));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi & Pembayaran Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f9fafb; font-family: 'Poppins', sans-serif; }
    .container { max-width: 800px; }
    .card { border-radius: 15px; padding: 30px; }
    .bukti-img { width: 120px; height: 120px; object-fit: cover; border-radius: 8px; border: 1px solid #ccc; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold text-success" href="#">InJourney Destinations</a>
</nav>

<div class="container mt-5 mb-5">
  <div class="card shadow-sm">
    <h4 class="text-success mb-4 fw-bold text-center">Konfirmasi & Pembayaran Tiket</h4>

    <table class="table table-bordered mb-4">
      <tr><th>Nomor Pesanan</th><td><?= $order_id ?></td></tr>
      <tr><th>Tanggal Kunjungan</th><td><?= htmlspecialchars($tanggal) ?></td></tr>
      <tr><th>Tipe Pengunjung</th><td><?= ucfirst($tipe) ?></td></tr>
      <tr><th>Dewasa</th><td><?= $dewasa ?></td></tr>
      <tr><th>Anak-anak</th><td><?= $anak ?></td></tr>
      <tr><th>Metode Pembayaran</th><td><?= htmlspecialchars($metode) ?></td></tr>
      <tr><th>Subtotal</th><td>IDR <?= number_format($subtotal, 0, ',', '.') ?></td></tr>
      <tr><th>Biaya Admin</th><td>IDR <?= number_format($fee, 0, ',', '.') ?></td></tr>
      <tr><th><strong>Total Pembayaran</strong></th><td><strong>IDR <?= number_format($total, 0, ',', '.') ?></strong></td></tr>
    </table>

    <form method="POST" action="simpan_pesanan.php" enctype="multipart/form-data">
      <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
      <input type="hidden" name="tipe" value="<?= $tipe ?>">
      <input type="hidden" name="dewasa" value="<?= $dewasa ?>">
      <input type="hidden" name="anak" value="<?= $anak ?>">
      <input type="hidden" name="metode" value="<?= $metode ?>">
      <input type="hidden" name="total" value="<?= $total ?>">

      <div class="mb-3">
        <label class="form-label fw-bold">Upload Bukti Pembayaran:</label>
        <input type="file" name="bukti" class="form-control" accept="image/*" required>
        <small class="text-muted">Format JPG/PNG, maks 2MB</small>
      </div>

      <div class="text-center mt-4">
        <button type="submit" name="konfirmasi" class="btn btn-success px-4">Konfirmasi & Simpan Pesanan</button>
        <a href="tiket.php" class="btn btn-outline-secondary ms-2">Kembali</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>
