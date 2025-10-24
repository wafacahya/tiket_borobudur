<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beli Tiket Candi Borobudur & Prambanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Poppins', sans-serif;
    }
   /* Navbar Transparan */
    .navbar {
      position: absolute;
      top: 0;
      width: 100%;
      z-index: 10;
      background: rgba(0, 0, 0, 0.4);
      padding: 15px 40px;
    }
    .navbar a {
      color: white !important;
      font-weight: 500;
      margin: 0 15px;
      text-decoration: none;
      font-size: 15px;
    }
    .navbar a:hover {
      color: #b5ff7d !important;
      border-bottom: 2px solid #b5ff7d;
    }
    .navbar-brand {
      font-weight: bold;
      color: white !important;
    }
    .hero {
      height: 360px;
      border-radius: 15px;
      background-size: cover;
      background-position: center;
      transition: transform 0.3s ease-in-out;
    }
    .hero:hover {
      transform: scale(1.02);
    }
    .content-box {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .btn-green {
      background-color: #4CAF50;
      color: white;
      border: none;
    }
    .btn-green:hover {
      background-color: #43a047;
    }
    .section-title {
      font-weight: 700;
      margin-top: 50px;
      margin-bottom: 25px;
      text-transform: uppercase;
      color: #2e7d32;
    }
  </style>
</head>
<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">InJourney DESTINATIONS</a>
  <div class="ms-auto">
    <a href="dashboard.php" class="active">Beranda</a>
   <a href="sejarah.php">Sejarah</a>
    <a href="#galeri">Galeri</a>
    <a href="#agenda">Agenda</a>
    <a href="beli_tiket.php">Tiket</a>
     <a href="#kontak">Kontak</a>
    <a href="logout.php" onclick="confirmLogout()">Logout</a>
  </div>
</nav>
<div class="container mt-5">

  <!-- === CANDI BOROBUDUR === -->
  <h3 class="section-title">Candi Borobudur</h3>
  <div class="row align-items-center mb-5">
    <div class="col-md-6 mb-3 mb-md-0">
      <div class="hero" style="background-image: url('img/borobudur.jpeg');"></div>
    </div>
    <div class="col-md-6">
      <div class="content-box">
        <h5 class="text-muted mb-1">BOROBUDUR</h5>
        <h2 class="fw-bold text-success">Nikmati Keagungan Candi Borobudur</h2>
        <p class="mt-3">Jelajahi keindahan dan sejarah Candi Borobudur — warisan dunia UNESCO yang megah. Pilih tiket halaman atau naik ke puncak candi untuk pengalaman lebih berkesan.</p>
        <a href="tiket.php" class="btn btn-green mt-2">Pesan Tiket Borobudur</a>
      </div>
    </div>
  </div>

  <!-- === CANDI PRAMBANAN === -->
  <h3 class="section-title">Candi Prambanan</h3>
  <div class="row align-items-center flex-md-row-reverse">
    <div class="col-md-6 mb-3 mb-md-0">
      <div class="hero" style="background-image: url('img/prambanan.jpg');"></div>
    </div>
    <div class="col-md-6">
      <div class="content-box">
        <h5 class="text-muted mb-1">PRAMBANAN</h5>
        <h2 class="fw-bold text-success">Eksplorasi Keindahan Candi Prambanan</h2>
        <p class="mt-3">Temukan kisah cinta Ramayana di balik megahnya arsitektur Hindu abad ke-9. Pilih jenis tiket sesuai kebutuhan Anda dan nikmati pengalaman sejarah tak terlupakan.</p>
        <a href="tiket_prambanan.php" class="btn btn-green mt-2">Pesan Tiket Prambanan</a>
      </div>
    </div>
  </div>

</div>
</body>
</html>
