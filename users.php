<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Data User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
</style>
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
</div>
  <div class="container-fluid" style="margin-left:260px;">
    <h3 class="mt-4">Data User</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM users");
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['role']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
