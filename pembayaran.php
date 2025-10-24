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

// Ambil data pesanan
$tanggal = $_POST['tanggal'];
$tipe = $_POST['tipe'];
$dewasa = $_POST['dewasa'];
$anak = $_POST['anak'];
$metode = $_POST['metode'];
$email = $_SESSION['email'] ?? 'user@example.com'; // opsional
$order_id = strtoupper("V" . rand(10000,99999) . "-" . substr(md5(time()), 0, 8));

// Harga & total
$hargaDewasa = ($tipe == 'mancanegara') ? 350000 : 50000;
$hargaAnak = ($tipe == 'mancanegara') ? 150000 : 25000;
$subtotal = ($dewasa * $hargaDewasa) + ($anak * $hargaAnak);
$fee = 5000;
$total = $subtotal + $fee;

// Tentukan Virtual Account sesuai metode
switch($metode){
  case 'Transfer Bank': $bank = "BCA Virtual Account"; $va = "1396" . rand(10000000,99999999); break;
  case 'E-Wallet': $bank = "GoPay / DANA / OVO"; $va = "EW" . rand(100000,999999); break;
  case 'Kartu Kredit': $bank = "Visa / MasterCard"; $va = "CC" . rand(100000,999999); break;
  default: $bank = "Bank Transfer"; $va = "0000000000"; break;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran Tiket Borobudur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { background-color: #fafafa; font-family: 'Poppins', sans-serif; }
    .payment-box { background: white; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); padding: 30px; margin-top: 30px; }
    .highlight-box { background-color: #f9f4e1; border-radius: 8px; padding: 12px 18px; color: #856404; font-weight: 500; display: flex; align-items: center; gap: 10px; }
    .va-box { background-color: #eef7ff; border-radius: 8px; padding: 20px; text-align: center; }
    .btn-outline-success { border: 2px solid #4CAF50; color: #4CAF50; }
    .btn-outline-success:hover { background: #4CAF50; color: white; }
    .small-text { font-size: 0.9em; color: #777; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold text-success" href="#">InJourney Destinations</a>
</nav>

<div class="container">
  <div class="payment-box">
    <h4 class="fw-bold mb-3">Candi Borobudur - Pelataran</h4>
    <p class="text-muted mb-4">Candi Borobudur</p>

    <div class="highlight-box mb-3">
      <i class="bi bi-clock-history"></i>
      <span>Selesaikan pembayaran sebelum: 
        <strong id="countdown" class="ms-1">00:10:00</strong> WIB
      </span>
    </div>

    <div class="border-bottom pb-3 mb-3">
      <p class="mb-1 small-text">ORDER NUMBER</p>
      <strong><?= $order_id ?></strong><br>
      <p class="mb-1 small-text mt-2">BUYER’S EMAIL</p>
      <strong><?= htmlspecialchars($email) ?></strong>
    </div>

    <h6 class="fw-bold mb-2">Order Detail</h6>
    <p class="mb-1"><?= $dewasa ?>x Dewasa - <?= ucfirst($tipe) ?> | <?= htmlspecialchars($tanggal) ?></p>
    <?php if($anak > 0): ?>
      <p><?= $anak ?>x Anak-anak - <?= ucfirst($tipe) ?></p>
    <?php endif; ?>

    <hr>

    <h6 class="fw-bold mt-3">Order Summary</h6>
    <div class="d-flex justify-content-between"><span>Subtotal</span><span>IDR <?= number_format($subtotal,0,',','.') ?></span></div>
    <div class="d-flex justify-content-between"><span>Service Fee</span><span>IDR <?= number_format($fee,0,',','.') ?></span></div>
    <div class="d-flex justify-content-between fw-bold border-top pt-2">
      <span>Total</span><span>IDR <?= number_format($total,0,',','.') ?></span>
    </div>

    <div class="va-box mt-4">
      <p class="fw-bold mb-1"><?= $bank ?></p>
      <h4 class="text-primary fw-bold"><?= $va ?></h4>
      <button class="btn btn-sm btn-outline-primary mt-2" onclick="copyVA()">Copy Number</button>
      <p class="small-text mt-3 mb-0">Merchant: <strong>InJourney</strong></p>
      <p class="small-text">Amount to Pay: <strong>IDR <?= number_format($total,0,',','.') ?></strong></p>
    </div>

    <div class="text-center mt-4">
      <button class="btn btn-outline-success px-4" onclick="checkPayment()">Check Payment Status</button>
      <p class="text-muted small mt-2">Tekan tombol ini setelah melakukan pembayaran.</p>
    </div>
  </div>
</div>

<div class="text-center mt-4">
  <form method="POST" action="simpan_pesanan.php">
    <input type="hidden" name="order_id" value="<?= $order_id ?>">
    <button type="submit" class="btn btn-success px-4">Saya Sudah Bayar</button>
  </form>
  <p class="text-muted small mt-2">Tekan tombol ini setelah melakukan pembayaran untuk konfirmasi ke admin.</p>
</div>


<script>
// Countdown timer 10 menit
let timeLeft = 10 * 60;
let timer = setInterval(() => {
  let minutes = Math.floor(timeLeft / 60);
  let seconds = timeLeft % 60;
  document.getElementById("countdown").textContent =
    `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
  if (timeLeft-- <= 0) {
    clearInterval(timer);
    alert("Waktu pembayaran telah habis!");
  }
}, 1000);

function copyVA() {
  const va = "<?= $va ?>";
  navigator.clipboard.writeText(va);
  alert("Nomor VA disalin: " + va);
}

function checkPayment() {
  alert("Simulasi: Pembayaran sedang dicek...");
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
</body>
</html>
