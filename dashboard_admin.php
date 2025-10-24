<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
  echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    /* Sidebar styling */
    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #212529;
      color: white;
      padding: 20px;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #00d084;
    }
    /* Konten utama */
    .content {
      margin-left: 250px; /* sama dengan lebar sidebar */
      padding: 30px;
    }
    .card {
      border: none;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
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

  <!-- Konten -->
  <div class="content">
    <h2 class="fw-bold text-success mb-3">Selamat Datang di Dashboard Admin</h2>
    <p>Gunakan menu di sidebar untuk mengelola data pengguna dan transaksi.</p>

    <div class="row mt-4">
      <div class="col-md-4 mb-3">
        <div class="card text-center p-3">
          <div class="card-body">
            <h5>Total User</h5>
            <?php
              $u = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM users"));
              echo "<h2 class='text-primary'>{$u['total']}</h2>";
            ?>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card text-center p-3">
          <div class="card-body">
            <h5>Total Transaksi</h5>
            <?php
              $t = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi"));
              echo "<h2 class='text-primary'>{$t['total']}</h2>";
            ?>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card text-center p-3">
          <div class="card-body">
            <h5>Transaksi ACC</h5>
            <?php
              $s = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM transaksi WHERE status='sukses'"));
              echo "<h2 class='text-primary'>{$s['total']}</h2>";
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
