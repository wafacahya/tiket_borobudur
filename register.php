<?php
include 'db.php';

if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nama,email,password,role) VALUES ('$nama','$email','$password','user')";
    if($conn->query($sql)){
        header("Location: login.php");
    } else {
        echo "Gagal mendaftar: ".$conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Akun | InJourney Destinations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      background: url('img/borobudur2.jpg') center/cover no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
      z-index: 0;
    }

    .card-register {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.3);
      width: 380px;
      padding: 40px 30px;
      color: white;
      animation: fadeIn 0.8s ease-in-out;
    }

    .card-register h2 {
      font-weight: 600;
      text-align: center;
      margin-bottom: 25px;
      color: #fff;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-size: 15px;
    }

    .form-control:focus {
      box-shadow: 0 0 10px rgba(72, 239, 128, 0.7);
      border: 1px solid #2ecc71;
    }

    .btn-register {
      background: linear-gradient(135deg, #27ae60, #2ecc71);
      color: #fff;
      border: none;
      border-radius: 10px;
      width: 100%;
      padding: 12px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .btn-register:hover {
      background: linear-gradient(135deg, #1e8449, #27ae60);
    }

  
   
  </style>
</head>
<body>

  <div class="card-register">
    <h2>Daftar Akun</h2>

    <form method="post">
      <div class="mb-3">
        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>

      <button type="submit" name="register" class="btn-register mb-3">Daftar</button>

      <p class="text-center text-light">
        Sudah punya akun? <a href="login.php">Login Sekarang</a>
      </p>
    </form>
  </div>

</body>
</html>
