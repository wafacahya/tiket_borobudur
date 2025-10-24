<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InJourney Destinations - Candi Borobudur</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<!-- ====== HEADER / NAVBAR ====== -->
<header>
    <div class="logo">
        <h2>InJourney Destinations</h2>
    </div>
    <nav>
        <ul>
            <li><a href="#beranda" class="active">Beranda</a></li>
            <li><a href="#tentang">Sejarah</a></li>
            <li><a href="#galeri">Galeri</a></li>
            <li><a href="#agenda">Agenda</a></li>
            <li ><a href="#informasi">Destination Info</a></li>
            <li><a href="beli_tiket.php">Tiket</a></li>
            <li><a href="#kontak">Kontak</a></li>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'user'): ?>
                <li><a href="#" onclick="confirmLogout()">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<script>
function confirmLogout() {
    if (confirm('Apakah kamu yakin ingin logout?')) {
        window.location.href = 'logout.php';
    }
}
</script>

<!-- ====== HERO SECTION (Bootstrap Carousel Manual, overlay fix) ====== -->
<section id="beranda">
  <div id="heroCarousel" class="carousel slide" data-bs-interval="false">
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active position-relative">
        <img src="img/borobudur.jpeg" class="d-block w-100" style="height: 90vh; object-fit: cover;" alt="Candi Borobudur 1">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4);"></div>
        <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center text-white">
          <?php if (isset($_SESSION['nama'])): ?>
            <h1 class="fw-bold display-5">Selamat Datang, <?= htmlspecialchars($_SESSION['nama']); ?>!</h1>
          <?php else: ?>
            <h1 class="fw-bold display-5">Selamat Datang di Candi Borobudur</h1>
          <?php endif; ?>
          <p class="lead mt-3 mb-4">Temukan pesona dan keajaiban Candi Borobudur di setiap langkah perjalananmu.</p>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'user'): ?>
            <a href="beli_tiket.php" class="btn btn-success btn-lg rounded-pill">🎟️ buy ticket</a>
          <?php else: ?>
            <a href="login.php" class="btn btn-success btn-lg rounded-pill">🎟️ buy  ticket</a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item position-relative">
        <img src="img/borobudur2.jpg" class="d-block w-100" style="height: 90vh; object-fit: cover;" alt="Candi Borobudur 2">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4);"></div>
        <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center text-white">
          <h1 class="fw-bold display-5">Jelajahi Keindahan Dunia Warisan Budaya</h1>
          <p class="lead mt-3 mb-4">Nikmati pesona arsitektur megah dan panorama alam di sekitarnya.</p>
          <a href="#tentang" class="btn btn-light btn-lg rounded-pill">Pelajari Sejarah</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item position-relative">
        <img src="img/borobudur3.jpg" class="d-block w-100" style="height: 90vh; object-fit: cover;" alt="Candi Borobudur 3">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4);"></div>
        <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center text-white">
          <h1 class="fw-bold display-5">Temukan Ketenangan dan Makna di Setiap Relief</h1>
          <p class="lead mt-3 mb-4">Sebuah perjalanan spiritual dan budaya yang tak terlupakan.</p>
          <a href="#galeri" class="btn btn-success btn-lg rounded-pill">Lihat Galeri</a>
        </div>
      </div>

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
      <span class="visually-hidden">Sebelumnya</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
      <span class="visually-hidden">Berikutnya</span>
    </button>
  </div>
</section>


<!-- ====== SEJARAH ====== -->
<section id="tentang" class="tentang" style="padding: 80px 10%; background: #fff;">
  <div class="container" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 40px;">
    <div class="teks" style="flex: 1 1 50%; min-width: 300px;">
      <h2 style="font-size: 2rem; margin-bottom: 20px;">Sejarah Borobudur</h2>
      <p style="line-height: 1.8; margin-bottom: 20px;">
        Dinasti Sailendra membangun peninggalan Budha terbesar di dunia antara 780-840 Masehi.
        Peninggalan ini dibangun sebagai tempat pemujaan Budha dan tempat ziarah, berisi petunjuk
        agar manusia menjauhkan diri dari nafsu dunia dan menuju pencerahan serta kebijaksanaan.
      </p>
      <p style="line-height: 1.8; margin-bottom: 30px;">
        Borobudur dibangun dengan gaya Mandala yang mencerminkan alam semesta dalam kepercayaan Buddha.
        Struktur bangunan ini berbentuk kotak dengan empat pintu masuk dan titik pusat berbentuk lingkaran.
      </p>
      <a href="sejarah.php" 
         style="display: inline-block; padding: 12px 25px; background-color: #b1bdbce0; color: white; border-radius: 30px; font-weight: bold; text-decoration: none;">
        Lihat Selengkapnya
      </a>
    </div>

    <div class="gambar" style="flex: 1 1 40%; min-width: 280px; position: relative;">
      <img src="img/borobudur2.jpg" alt="Candi Borobudur" 
           style="width: 100%; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
      <img src="img/borobudur3.jpg" alt="Candi Borobudur Detail" 
           style="position: absolute; bottom: -40px; left: -40px; width: 75%; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
    </div>
  </div>
</section>

<!-- ====== BOROBUDUR VENUE SECTION ====== -->
<section id="venue" class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-2">Borobudur Venue</h2>
    <p class="text-muted mb-5">Jelajahi Lokasi Ikonik dan Area Sekitar Candi</p>

    <!-- Carousel -->
    <div id="venueCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row justify-content-center g-4">
            
            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="img/bukitdagi.jpg" class="card-img-top" alt="Bukit Dagi Borobudur">
                <div class="card-body text-start">
                  <h5 class="card-title fw-bold">Bukit Dagi Borobudur</h5>
                  <p class="card-text">Area perbukitan yang menawarkan pemandangan megah Candi Borobudur dari ketinggian. Tempat ini juga digunakan untuk piknik dan meditasi.</p>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
             <div class="col-md-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="img/karmawibhangga.jpg" class="card-img-top" alt="Bukit Dagi Borobudur">
                <div class="card-body text-start">
                  <h5 class="card-title fw-bold">Karmawibhangga</h5>
                  <p class="card-text">Salah satu relief yang terdapat dalam Candi Borobudur dan mengandung nilai mengenai sebab-akibat. Terletak tepat di seberang Museum Karmawibhangga.</p>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="img/tamanpadma.jpg" class="card-img-top" alt="Taman Padma Borobudur">
                <div class="card-body text-start">
                  <h5 class="card-title fw-bold">Taman Padma Borobudur</h5>
                  <p class="card-text">Ruang hijau indah di sekitar kompleks candi, cocok untuk bersantai sambil menikmati udara segar dan panorama alam.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#venueCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-success rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#venueCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-success rounded-circle p-3" aria-hidden="true"></span>
        <span class="visually-hidden">Berikutnya</span>
      </button>

    </div>
  </div>
</section>


<!-- ====== INFORMASI PERJALANAN KE CANDI BOROBUDUR ====== -->
<section id="informasi" class="py-5" style="background-color:#f8f9fa;">
  <div class="container">
    <h2 class="fw-bold mb-4 text-center">Informasi Perjalanan Ke Candi Borobudur</h2>
    <p class="text-center text-muted mb-5">
      Terdapat beberapa cara menuju lokasi Candi Borobudur dengan menggunakan bus dari Yogyakarta, kendaraan pribadi, dan bus dari Semarang.
    </p>

    <!-- Tabs -->
    <ul class="nav nav-tabs justify-content-center mb-4" id="infoTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="jam-tab" data-bs-toggle="tab" data-bs-target="#jam" type="button" role="tab">Jam Operasional</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="yogya-tab" data-bs-toggle="tab" data-bs-target="#yogya" type="button" role="tab">Bus dari Yogyakarta</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pribadi-tab" data-bs-toggle="tab" data-bs-target="#pribadi" type="button" role="tab">Kendaraan Pribadi</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="semarang-tab" data-bs-toggle="tab" data-bs-target="#semarang" type="button" role="tab">Bus dari Semarang</button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="infoTabContent">
      
      <!-- JAM OPERASIONAL -->
      <div class="tab-pane fade show active" id="jam" role="tabpanel">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h4 class="fw-bold mb-3">Jam Operasional</h4>
            <ul class="list-unstyled">
              <li class="mb-2">🕕 <strong>Buka Setiap Hari:</strong> 06.30 - 17.30 WIB</li>
              <li>📅 <strong>Hari Senin:</strong> Hanya menerima kunjungan di luar struktur candi (pelataran dan taman).</li>
            </ul>
          </div>
          <div class="col-md-6 text-center">
            <img src="img/borobudur3.jpg" alt="Candi Borobudur" class="img-fluid rounded shadow-sm">
          </div>
        </div>
      </div>

      <!-- BUS DARI YOGYAKARTA -->
      <div class="tab-pane fade" id="yogya" role="tabpanel">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h4 class="fw-bold mb-3">Bus dari Yogyakarta</h4>
            <p>Dari Terminal Jombor Yogyakarta, tersedia bus langsung menuju Terminal Borobudur dengan waktu tempuh sekitar 1,5 jam.</p>
            <ul>
              <li>🚌 Bus Damri / Trans Jogja – Borobudur</li>
              <li>💰 Tarif sekitar Rp25.000 – Rp30.000</li>
              <li>⏱️ Keberangkatan setiap 30 menit</li>
            </ul>
          </div>
          <div class="col-md-6 text-center">
            <img src="img/bus.jpeg" alt="Bus dari Yogyakarta" class="img-fluid rounded shadow-sm">
          </div>
        </div>
      </div>

      <!-- KENDARAAN PRIBADI -->
      <div class="tab-pane fade" id="pribadi" role="tabpanel">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h4 class="fw-bold mb-3">Kendaraan Pribadi</h4>
            <p>Perjalanan dari Yogyakarta ke Candi Borobudur dapat ditempuh sekitar 1–1,5 jam menggunakan mobil pribadi.</p>
            <ul>
              <li>🚗 Rute: Yogyakarta → Jalan Magelang → Mungkid → Borobudur</li>
              <li>🅿️ Area parkir luas tersedia di sekitar kompleks candi</li>
              <li>⛽ SPBU dan tempat makan mudah ditemukan di sepanjang jalur</li>
            </ul>
          </div>
          <div class="col-md-6 text-center">
            <img src="img/mobil.jpg" alt="Kendaraan Pribadi" class="img-fluid rounded shadow-sm">
          </div>
        </div>
      </div>

      <!-- BUS DARI SEMARANG -->
      <div class="tab-pane fade" id="semarang" role="tabpanel">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h4 class="fw-bold mb-3">Bus dari Semarang</h4>
            <p>Dari Terminal Terboyo Semarang, tersedia bus jurusan Magelang yang menuju Terminal Borobudur.</p>
            <ul>
              <li>🚌 Rute: Semarang → Ambarawa → Magelang → Borobudur</li>
              <li>💰 Tarif sekitar Rp40.000 – Rp50.000</li>
              <li>🕐 Waktu tempuh sekitar 2–2,5 jam</li>
            </ul>
          </div>
          <div class="col-md-6 text-center">
            <img src="img/bus.jpeg" alt="Bus dari Semarang" class="img-fluid rounded shadow-sm">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ====== GALERI ====== -->
<section id="galeri" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Borobudur Galeri</h2>
    <div class="row g-4 align-items-stretch">

      <!-- Gambar besar di kiri -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <img src="img/borobudur.jpeg" class="card-img-top rounded-4 h-100" style="object-fit: cover;" alt="Borobudur 1">
        </div>
      </div>

      <!-- Grid kecil di kanan -->
      <div class="col-lg-6">
        <div class="row g-4">
          <div class="col-6">
            <img src="img/borobudur2.jpg" class="img-fluid rounded-4 shadow-sm" style="object-fit: cover; height: 200px; width: 100%;" alt="Borobudur 2">
          </div>
          <div class="col-6">
            <img src="img/borobudur3.jpg" class="img-fluid rounded-4 shadow-sm" style="object-fit: cover; height: 200px; width: 100%;" alt="Borobudur 3">
          </div>
          <div class="col-6">
            <img src="img/sejarah.jpg" class="img-fluid rounded-4 shadow-sm" style="object-fit: cover; height: 200px; width: 100%;" alt="Borobudur 4">
          </div>
          <div class="col-6">
            <img src="img/borobudur5.jpg" class="img-fluid rounded-4 shadow-sm" style="object-fit: cover; height: 200px; width: 100%;" alt="Borobudur 5">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ====== AGENDA ====== -->
<section id="agenda" class="agenda">
    <h2>Agenda & Info Wisata</h2>
    <div class="agenda-box">
        <div class="agenda-item">
            <h3>Festival Borobudur</h3>
            <p>Menampilkan seni budaya, pameran UMKM, dan pertunjukan malam di pelataran Candi.</p>
        </div>
        <div class="agenda-item">
            <h3>Sunrise Experience</h3>
            <p>Nikmati keindahan matahari terbit dari puncak Candi Borobudur, pengalaman yang tak terlupakan.</p>
        </div>
        <div class="agenda-item">
            <h3>Tur Edukasi</h3>
            <p>Program wisata edukatif untuk pelajar dan keluarga mengenal sejarah serta filosofi Candi.</p>
        </div>
    </div>
</section>

<!-- ====== FOOTER ====== -->
<footer id="kontak" style="background: #222; color: #fff; text-align: center; padding: 30px 0;">
    <div class="container">
        <p>© <?= date('Y'); ?> Candi Borobudur | Dikembangkan untuk Proyek Wisata Budaya</p>
    </div>
</footer>

</body>
</html>
