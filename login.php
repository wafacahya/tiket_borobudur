<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){
                header("Location: dashboard_admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | InJourney Destinations</title>
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

    /* Overlay gelap agar teks tetap jelas */
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
      z-index: 0;
    }

    .card-login {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.3);
      width: 360px;
      padding: 35px 25px;
      color: white;
      animation: fadeIn 0.8s ease-in-out;
    }

    .card-login h2 {
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

    .btn-login {
      background: linear-gradient(135deg, #27ae60, #2ecc71);
      color: #fff;
      border: none;
      border-radius: 10px;
      width: 100%;
      padding: 12px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #1e8449, #27ae60);
    }

  
    .error {
      background: rgba(255, 0, 0, 0.1);
      color: #ffb3b3;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 10px;
      text-align: center;
      font-size: 14px;
    }


  </style>
</head>
<body>

  <div class="card-login">
    <h2>Login Akun</h2>
    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="post">
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>

      <button type="submit" name="login" class="btn-login mb-3">Masuk</button>

      <p class="text-center text-light ">
        Belum punya akun? <a href="register.php">Daftar Sekarang</a>
      </p>
    </form>
  </div>

</body>
</html>
