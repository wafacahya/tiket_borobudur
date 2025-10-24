<?php
session_start();
include 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['id_user'])) {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
  exit;
}

$id_user = $_SESSION['id_user'];

// Ambil data transaksi user
$query = "SELECT * FROM transaksi WHERE id_user = '$id_user' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Ambil transaksi terakhir untuk alert konfirmasi
$lastQuery = "SELECT status FROM transaksi WHERE id_user='$id_user' ORDER BY id DESC LIMIT 1";
$lastResult = mysqli_query($conn, $lastQuery);
$lastStatus = ($lastResult && mysqli_num_rows($lastResult) > 0) ? mysqli_fetch_assoc($lastResult)['status'] : null;

// Tampilkan alert sesuai status
if (!isset($_SESSION['alert_shown'])) {
  if ($lastStatus === 'pending') {
    echo "<script>alert('Pesanan berhasil dikirim, silakan tunggu admin untuk ACC.');</script>";
  } elseif ($lastStatus === 'sukses' || $lastStatus === 'approved') {
    echo "<script>alert('Pesanan Anda telah disetujui oleh admin!');</script>";
  } elseif ($lastStatus === 'rejected') {
    echo "<script>alert('Maaf, pesanan Anda ditolak. Silakan hubungi admin.');</script>";
  }
  $_SESSION['alert_shown'] = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pemesanan Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }
    .navbar-brand {
      font-weight: 600;
      color: #2E7D32 !important;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    table {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
    }
    th {
      background-color: #198754 !important;
      color: #fff;
    }
    .table img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold" href="#">InJourney Destinations</a>
  <div class="ms-auto">
    <a href="dashboard.php" class="btn btn-outline-success btn-sm me-2">Beranda</a>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
  </div>
</nav>

<!-- Konten -->
<div class="container mt-5 mb-5">
  <h3 class="text-success fw-bold mb-4 text-center">Riwayat Pemesanan Tiket Anda</h3>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="table-responsive">
      <table class="table table-hover text-center align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Kunjungan</th>
            <th>Tipe</th>
            <th>Dewasa</th>
            <th>Anak</th>
            <th>Metode</th>
            <th>Bukti Pembayaran</th>
            <th>Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)): 
            $badgeClass = match($row['status']) {
              'pending' => 'warning',
              'sukses', 'approved' => 'success',
              'rejected' => 'danger',
              default => 'secondary'
            };
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['tanggal']); ?></td>
            <td><?= ucfirst(htmlspecialchars($row['tipe'])); ?></td>
            <td><?= (int)$row['dewasa']; ?></td>
            <td><?= (int)$row['anak']; ?></td>
            <td><?= htmlspecialchars($row['metode'] ?? '-'); ?></td>
            <td>
              <?php if (!empty($row['bukti'])): ?>
                <a href="<?= htmlspecialchars($row['bukti']); ?>" target="_blank">
                  <img src="<?= htmlspecialchars($row['bukti']); ?>" alt="Bukti Pembayaran">
                </a>
              <?php else: ?>
                <span class="text-muted">Belum ada</span>
              <?php endif; ?>
            </td>
            <td>IDR <?= number_format($row['total'], 0, ',', '.'); ?></td>
            <td><span class="badge bg-<?= $badgeClass; ?>"><?= ucfirst($row['status']); ?></span></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info text-center mt-4">
      Belum ada pemesanan tiket yang dilakukan.
    </div>
  <?php endif; ?>
</div>

</body>
</html>