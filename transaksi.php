<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang bisa mengakses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
  echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
  exit;
}

// Ambil semua data transaksi
$result = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin | InJourney Destinations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100vh;
      background-color: #212529;
      color: white;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidebar h4 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 10px 15px;
      border-radius: 8px;
      margin-bottom: 8px;
      transition: all 0.3s ease;
    }

    .sidebar a:hover, 
    .sidebar a.active {
      background-color: #198754;
    }

    /* Navbar */
    .navbar {
      margin-left: 250px;
      background-color: #fff !important;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      z-index: 100;
    }

    .navbar-brand {
      font-weight: 600;
      color: #2E7D32 !important;
    }

    /* Konten utama */
    .content {
      margin-left: 250px;
      padding: 40px;
    }

    /* Tabel */
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

<!-- Sidebar -->
  <div class="sidebar d-flex flex-column">
    <h4 class="fw-bold mb-4 text-center">Dashboard Admin</h4>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item mb-2">
        <a href="dashboard_admin.php" class="nav-link text-white">Dashboard</a>
      </li>
      <li class="mb-2">
        <a href="users.php" class="nav-link text-white"> Data User</a>
      </li>
      <li class="mb-2">
        <a href="transaksi.php" class="nav-link text-white"> Data Transaksi</a>
      </li>
    </ul>
    <div class="mt-auto">
      <a href="logout.php" class="btn btn-danger w-100 mt-3">Logout</a>
    </div>
  </div>

<!-- Navbar -->
<nav class="navbar navbar-light px-4">
  <span class="navbar-brand fw-bold">InJourney Destinations - Admin Panel</span>
  <div>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
  </div>
</nav>

<!-- Konten -->
<div class="content">
  <h3 class="text-success fw-bold mb-4 text-center">Riwayat Transaksi Pengguna</h3>

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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)): 
            $badgeClass = match($row['status']) {
              'pending' => 'warning',
              'acc' => 'success',
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
            <td>
              <?php if ($row['status'] == 'pending'): ?>
                <a href="update_status.php?id=<?= $row['id'] ?>&status=sukses" class="btn btn-sm btn-success">ACC</a>
                <a href="update_status.php?id=<?= $row['id'] ?>&status=rejected" class="btn btn-sm btn-danger">Tolak</a>
              <?php elseif ($row['status'] == 'acc'): ?>
                <span class="text-success fw-bold">✔ Diterima</span>
              <?php elseif ($row['status'] == 'rejected'): ?>
                <span class="text-danger fw-bold">✖ Ditolak</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info text-center mt-4">
      Belum ada transaksi yang tercatat.
    </div>
  <?php endif; ?>
</div>

</body>
</html>
