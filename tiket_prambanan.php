<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id_user'])) {
  echo "<script>alert('Silakan login terlebih dahulu untuk membeli tiket!'); window.location='login.php';</script>";
  exit;
}

if (isset($_POST['beli'])) {
  $id_user = $_SESSION['id_user'];
  $tanggal = $_POST['tanggal'];
  $tipe = $_POST['tipe'];
  $dewasa = $_POST['dewasa'];
  $anak = $_POST['anak'];
  $metode = $_POST['metode'];

  // Hitung total harga
  $hargaDewasa = ($tipe == 'mancanegara') ? 250000 : 50000;
  $hargaAnak = ($tipe == 'mancanegara') ? 125000 : 25000;
  $total = ($dewasa * $hargaDewasa) + ($anak * $hargaAnak);

  // Upload bukti pembayaran
  $target_dir = "uploads/";
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  $bukti = $_FILES['bukti']['name'];
  $tmp_name = $_FILES['bukti']['tmp_name'];
  $file_path = $target_dir . time() . "_" . basename($bukti);

  if (!empty($bukti)) {
    move_uploaded_file($tmp_name, $file_path);
  } else {
    $file_path = NULL;
  }

  // Simpan ke database
  $query = "INSERT INTO transaksi (id_user, tanggal, tipe, dewasa, anak, total, metode, bukti, status)
            VALUES ('$id_user', '$tanggal', '$tipe', '$dewasa', '$anak', '$total', '$metode', '$file_path', 'pending')";
  mysqli_query($conn, $query);

  echo "<script>alert('Tiket berhasil dipesan dan bukti pembayaran dikirim! Silakan tunggu admin untuk ACC.'); window.location='riwayat.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tiket Candi Prambanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f9fafb; font-family: 'Poppins', sans-serif; }
    .container { max-width: 700px; }
    .ticket-card { border-radius: 15px; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 25px; margin-top: 20px; }
    .btn-green { background-color: #4CAF50; color: white; }
    .btn-green:hover { background-color: #43a047; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
  <a class="navbar-brand fw-bold" href="#">InJourney Destinations</a>
</nav>

<div class="container mt-5">
  <h3 class="text-success fw-bold mb-3 text-center">Pesan Tiket Candi Prambanan</h3>

 <form method="POST" action="konfirmasi.php" enctype="multipart/form-data" class="ticket-card">
    <div class="mb-3">
      <label class="form-label">Tanggal Kunjungan:</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tipe Pengunjung:</label>
      <select name="tipe" id="tipe" class="form-select" onchange="updateHarga()" required>
        <option value="domestik">Domestik</option>
        <option value="mancanegara">Mancanegara</option>
      </select>
    </div>

    <div class="ticket-card">
      <h6>Prambanan Dewasa</h6>
      <p class="text-muted">Harga: <span id="hargaDewasa">IDR 50.000</span></p>
      <input type="number" name="dewasa" id="dewasa" class="form-control w-25" value="0" min="0" onchange="hitungTotal()">
    </div>

    <div class="ticket-card">
      <h6>Prambanan Anak</h6>
      <p class="text-muted">Harga: <span id="hargaAnak">IDR 25.000</span></p>
      <input type="number" name="anak" id="anak" class="form-control w-25" value="0" min="0" onchange="hitungTotal()">
    </div>

   <!-- Metode Pembayaran Sederhana -->
    <div class="mt-4">
      <label class="form-label fw-bold">Pilih Metode Pembayaran:</label>
      <select name="metode" class="form-select" required>
        <optgroup label="Virtual Account">
          <option value="BCA Virtual Account">BCA Virtual Account</option>
          <option value="Mandiri Virtual Account">Mandiri Virtual Account</option>
          <option value="BNI Virtual Account">BNI Virtual Account</option>
          <option value="BRI Virtual Account">BRI Virtual Account</option>
          <option value="Permata Virtual Account">Permata Virtual Account</option>
          <option value="Bank BJB Virtual Account">Bank BJB Virtual Account</option>
          <option value="CIMB Virtual Account">CIMB Virtual Account</option>
          <option value="BNC Virtual Account">BNC Virtual Account</option>
          <option value="Bank Danamon Virtual Account">Bank Danamon Virtual Account</option>
          <option value="Other Bank">Other Bank</option>
        </optgroup>
        <optgroup label="Electronic Money">
          <option value="QRIS">QRIS</option>
        </optgroup>
      </select>
    </div>

    <!-- Tambahan: Upload Bukti -->
    <div class="mt-3">
      <label class="form-label fw-bold">Upload Bukti Pembayaran:</label>
      <input type="file" name="bukti" class="form-control" accept="image/*" required>
      <small class="text-muted">Format JPG/PNG, maks 2MB</small>
    </div>

    <div class="text-end mt-4">
      <h5>Total: <span id="total" class="text-success fw-bold">IDR 0</span></h5>
      <input type="hidden" name="total" id="totalHidden">
      <button type="submit" name="beli" class="btn btn-green mt-2">Pesan Tiket</button>
    </div>
  </form>
</div>

<script>
function updateHarga() {
  let tipe = document.getElementById("tipe").value;
  let hargaDewasa = tipe === "mancanegara" ? 250000 : 50000;
  let hargaAnak = tipe === "mancanegara" ? 125000 : 25000;
  document.getElementById("hargaDewasa").innerText = "IDR " + hargaDewasa.toLocaleString();
  document.getElementById("hargaAnak").innerText = "IDR " + hargaAnak.toLocaleString();
  hitungTotal();
}

function hitungTotal() {
  let tipe = document.getElementById("tipe").value;
  let hargaDewasa = tipe === "mancanegara" ? 250000 : 50000;
  let hargaAnak = tipe === "mancanegara" ? 125000 : 25000;
  let dewasa = parseInt(document.getElementById("dewasa").value) || 0;
  let anak = parseInt(document.getElementById("anak").value) || 0;
  let total = (dewasa * hargaDewasa) + (anak * hargaAnak);
  document.getElementById("total").innerText = "IDR " + total.toLocaleString();
  document.getElementById("totalHidden").value = total;
}
</script>
</body>
</html>
