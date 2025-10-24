<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sejarah Candi Borobudur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fff;
      color: #333;
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

    /* Hero Section */
    .hero {
      height: 400px;
      background: url('img/sejarah.jpg') center/cover no-repeat;
      color: white;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding-left: 80px;
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }
    .hero-content {
      position: relative;
      z-index: 2;
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
    .hero h1 {
      font-size: 60px;
      font-weight: 700;
      margin-top: 10px;
    }

    .hero-image-wrapper {
  width: 100%;
  height: 60vh; /* tinggi sekitar 60% layar */
  overflow: hidden;
  position: relative;
}

.borobudur-image {
  width: 85%; /* hampir penuh, tapi masih ada ruang di sisi kiri-kanan */
  max-width: 1100px;
  height: 80vh; /* tinggi setengah layar */
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
}

    .zona-title {
      color: #2b2b2b;
      font-weight: 700;
    }
    .zona-text {
      text-align: justify;
      line-height: 1.8;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">InJourney DESTINATIONS</a>
  <div class="ms-auto">
    <a href="index.php" class="active">Beranda</a>
    <a href="sejarah.php" style="border-bottom: 2px solid #b5ff7d;">Sejarah</a>
    <a href="#galeri">Galeri</a>
    <a href="info.php">Destination Info</a>
    <a href="#agenda">Agenda</a>
    <a href="#kontak">Kontak</a>
    <a href="#" onclick="confirmLogout()">Logout</a>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <div class="breadcrumb">
      <a href="dashboard.php">Beranda</a> &gt; <span>Sejarah</span>
    </div>
    <h1>Sejarah</h1>
  </div>
</section>

<!-- Konten Utama -->
<main class="content container py-5">
  <div class="text-center">
    <img src="img/borobudur3.jpg" class="borobudur-image mb-5" alt="Candi Borobudur">
  </div>

  <h2 class="fw-bold mb-3 text-center">Sejarah Candi Borobudur</h2>
  <p class="text-center" style="max-width: 800px; margin: 0 auto; text-align: justify;">
    Candi Borobudur adalah salah satu monumen Buddha terbesar dan paling megah di dunia. Dikenal sebagai simbol kejayaan arsitektur dan seni budaya dari masa lalu, Candi Borobudur memiliki sejarah yang kaya dan mendalam yang tercermin dalam setiap batu dan reliefnya.
  </p>
  <h2 class="fw-bold mt-5 text-center">Asal Usul Pembangunan</h2>
  <p style="max-width: 800px; margin: 0 auto; text-align: justify;">
    Dinasti Sailendra membangun peninggalan Buddha terbesar di dunia antara 780–840 Masehi. Dibangun sebagai tempat pemujaan dan ziarah, candi ini berisi petunjuk agar manusia menjauh dari nafsu dunia menuju pencerahan. Candi ini ditemukan kembali oleh pasukan Inggris pada tahun 1814 di bawah Sir Thomas Stamford Raffles, dan berhasil dibersihkan seluruhnya pada tahun 1835.
  </p>
  <p style="max-width: 800px; margin: 0 auto; text-align: justify;">
    Borobudur dibangun dengan gaya Mandala yang mencerminkan alam semesta dalam kepercayaan Buddha. Struktur bangunannya berbentuk kotak dengan empat pintu masuk dan titik pusat berbentuk lingkaran, menggambarkan perjalanan manusia menuju nirwana.
  </p>
</main>


<!-- Zona Section -->
<section class="container py-5">
  <div class="row mb-5">
    <div class="col-md-4">
      <img src="img/Kamadhatu.jpeg" class="img-fluid rounded shadow" alt="Zona Kamadhatu">
    </div>
    <div class="col-md-8">
      <h4 class="zona-title">Zona 1 : Kamadhatu</h4>
      <p class="zona-text">
        Alam dunia yang terlihat dan sedang dialami oleh manusia sekarang.
      </p>
      <p class="zona-text">
        Kamadhatu terdiri dari 160 relief yang menjelaskan Karmawibhangga Sutra, yaitu hukum sebab akibat. Menggambarkan mengenai sifat dan nafsu manusia, seperti merampok, membunuh, memperkosa, penyiksaan, dan fitnah.
      </p>
      <p class="zona-text">
      Tudung penutup pada bagian dasar telah dibuka secara permanen agar pengunjung dapat melihat relief yang tersembunyi di bagian bawah. Koleksi foto seluruh 160 foto relief dapat dilihat di Museum Candi Borobudur yang terdapat di Borobudur Archaeological Park.
  </p>
    </div>
  </div>

  <div class="row mb-5">
    <div class="col-md-4">
      <img src="img/Rupadhatu.jpg" class="img-fluid rounded shadow" alt="Zona Rupadhatu">
    </div>
    <div class="col-md-8">
      <h4 class="zona-title">Zona 2 : Rupadhatu</h4>
      <p class="zona-text">
       Alam peralihan, dimana manusia telah dibebaskan dari urusan dunia.
      </p>
      <p class="zona-text">
        Rapadhatu terdiri dari galeri ukiran relief batu dan patung buddha. Secara keseluruhan ada 328 patung Buddha yang juga memiliki hiasan relief pada ukirannya.
      Menurut manuskrip Sansekerta pada bagian ini terdiri dari 1300 relief yang berupa Gandhawyuha, Lalitawistara, Jataka dan Awadana. Seluruhnya membentang sejauh 2,5 km dengan 1212 panel.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <img src="img/Arupadhatu.jpeg" class="img-fluid rounded shadow" alt="Zona Arupadhatu">
    </div>
    <div class="col-md-8">
      <h4 class="zona-title">Zona 3 : Arupadhatu</h4>
       <p class="zona-text">
      Alam tertinggi, rumah Tuhan.
      </p>
      <p class="zona-text">
        Tiga serambi berbentuk lingkaran mengarah ke kubah di bagian pusat atau stupa yang menggambarkan kebangkitan dari dunia. Pada bagian ini tidak ada ornamen maupun hiasan, yang berarti menggambarkan kemurnian tertinggi.
      </p>
      <p class="zona-text">
     Serambi pada bagian ini terdiri dari stupa berbentuk lingkaran yang berlubang, lonceng terbalik, berisi patung Buddha yang mengarah ke bagian luar candi. Terdapat 72 stupa secara keseluruhan. Stupa terbesar yang berada di tengah tidak setinggi versi aslinya yang memiliki tinggi 42m diatas tanah dengan diameter 9.9m. Berbeda dengan stupa yang mengelilinginya, stupa pusat kosong dan menimbulkan perdebatan bahwa sebenarnya terdapat isi namun juga ada yang berpendapat bahwa stupa tersebut memang kosong.
  </p>
      </p>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
