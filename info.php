<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destination Info – Candi Borobudur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      color: #333;
      scroll-behavior: smooth;
    }

    /* Navbar */
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(6px);
      padding: 15px 40px;
      transition: background 0.3s;
    }
    .navbar a {
      color: #fff !important;
      font-weight: 500;
      margin: 0 15px;
      text-decoration: none;
      font-size: 15px;
      transition: all 0.2s;
    }
    .navbar a:hover {
      color: #b5ff7d !important;
      border-bottom: 2px solid #b5ff7d;
    }
    .navbar-brand {
      font-weight: bold;
      color: white !important;
      font-size: 20px;
      letter-spacing: 1px;
    }

    /* Hero Section */
    .hero {
      height: 500px;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url('img/Prambanan2.jpg') center/cover no-repeat;
      color: white;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding-left: 80px;
      text-shadow: 0 2px 6px rgba(0,0,0,0.5);
    }
    .hero h1 {
      font-size: 64px;
      font-weight: 700;
      animation: fadeInUp 1.2s ease;
    }
    .breadcrumb {
      color: #dcdcdc;
      font-size: 14px;
    }
    .breadcrumb a {
      color: #dcdcdc;
      text-decoration: none;
    }
    .breadcrumb a:hover {
      color: #b5ff7d;
    }


    /* Statistik Box */
    .stat-box {
      background: white;
      padding: 30px 20px;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
    }
    .stat-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }
    .stat-box h3 {
      font-size: 2.8rem;
      margin: 0;
      color: #2f5a42;
    }
    .stat-box p {
      margin: 0;
      font-size: 1rem;
      color: #666;
    }

    /* Sejarah Section */
    .bg-light {
      background: linear-gradient(180deg, #fafafa 0%, #edf3e0 100%);
    }
    .zone {
      background: white;
      border-left: 5px solid #8bc34a;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 25px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.05);
      transition: transform 0.3s;
    }
    .zone:hover {
      transform: scale(1.02);
    }

  

    /* Footer */
    footer {
      background: #1f1f1f;
      color: #ddd;
      font-size: 14px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">InJourney DESTINATIONS</a>
  <div class="ms-auto">
    <a href="index.php">Beranda</a>
    <a href="sejarah.php">Sejarah</a>
    <a href="#galeri">Galeri</a>
    <a href="info.php">Destination Info</a>
    <a href="#agenda">Agenda</a>
    <a href="#kontak">Kontak</a>
    <a href="#" onclick="confirmLogout()">Logout</a>
  </div>
</nav>

<script>
function confirmLogout(){
  if(confirm('Apakah kamu yakin ingin logout?')){
    window.location.href='logout.php';
  }
}
</script>

<!-- Hero -->
<section class="hero">
  <div class="breadcrumb">
    <a href="dashboard.php">Beranda</a> &gt; <span>Destination Info</span>
  </div>
  <h1>Destination Info</h1>
</section>

<!-- Info Utama -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <img src="img/borobudur2.jpg" class="img-fluid rounded shadow" alt="Candi Borobudur">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold text-success mb-3">Candi Borobudur</h2>
        <p>Candi Borobudur adalah salah satu situs warisan dunia UNESCO yang paling terkenal di dunia. Terletak di Kabupaten Magelang, Jawa Tengah, Indonesia, candi ini merupakan candi Buddha terbesar di dunia dan menjadi salah satu tujuan wisata paling populer di Asia Tenggara.</p>
      </div>
    </div>

    <div class="row g-4 text-center">
      <div class="col-md-3 stat-box">
        <h3>3 Jt+</h3>
        <p>Pengunjung per Tahun</p>
      </div>
      <div class="col-md-3 stat-box">
        <h3>2 Rb+</h3>
        <p>Panel Relief</p>
      </div>
      <div class="col-md-3 stat-box">
        <h3>500+</h3>
        <p>Arca Buddha</p>
      </div>
      <div class="col-md-3 stat-box">
        <h3>500+</h3>
        <p>Atraksi per Tahun</p>
      </div>
    </div>
  </div>
</section>

<!-- Sejarah dan Zona -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4 text-center text-success">Sejarah Candi Borobudur</h2>
    <p class="text-center mb-5">Dinasti Sailendra membangun peninggalan Budha terbesar di dunia antara 780–840 Masehi. Dibangun sebagai tempat pemujaan Budha dan tempat ziarah.</p>
    
    <div class="text-center mb-5">
      <img src="img/borobudur6.jpeg" class="img-fluid rounded shadow" alt="Candi Borobudur dari udara" style="max-width: 800px;">
    </div>

    <div class="zone">
      <h4 class="fw-bold">Zona 1: Kamadhatu</h4>
      <p>Kamadhatu terdiri dari 160 relief yang menjelaskan Karmawibhangga Sutra, hukum sebab akibat yang menggambarkan nafsu dan perbuatan manusia.</p>
    </div>
    <div class="zone">
      <h4 class="fw-bold">Zona 2: Rupadhatu</h4>
      <p>Rupadhatu terdiri dari galeri ukiran relief batu dan 328 patung Buddha dengan ukiran indah yang melambangkan jalan menuju pencerahan.</p>
    </div>
    <div class="zone">
      <h4 class="fw-bold">Zona 3: Arupadhatu</h4>
      <p>Tiga serambi berbentuk lingkaran menuju stupa pusat yang menggambarkan kebangkitan dari dunia — melambangkan kemurnian dan kesempurnaan tertinggi.</p>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-center py-4">
  <p class="mb-0">© <?= date('Y'); ?> Candi Borobudur | InJourney Destinations</p>
</footer>

</body>
</html>
