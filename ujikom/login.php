<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>WahYep</title>
</head>
<body>
<header>
        <img src="image/Wahyep.png" alt="logo" class="image">
        <nav>
            <div class="nav-kanan">
                <a href="home.php">HOME</a>
                <a href="tentang.php">TENTANG</a>
                <a href="https://wa.me/6289519633536" target="_blank">HUBUNGI</a>
                <a href="produk.php">PRODUK</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>LOG IN</h1>
        <form action="" method="post">
            <div class="input">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <input type="text" name="username" id="username" required />
                <label for="username">Username</label>
            </div>
            <div class="input">
                <span class="icon">
                    <ion-icon id="eye-icon" name="eye-outline"></ion-icon>
                  </span>
                <input type="password" name="password" id="password-login" required />
                <label for="password-login">Password</label>
            </div>
            <div>
                <button class="button">LOG IN</button>
            </div>
        </form>
    </div>

    <!-- UNTUK ICON -->
    <script
    type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/script/script.js"></script>
</body>
</html>

<?php 
    session_start();
    include "koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Uname = $_POST['username'];
        $Upass = $_POST['password'];

        $cari = "SELECT role FROM admin WHERE  username = '$Uname' AND password = '$Upass'";
        $hasil = $koneksi->query($cari);

        if ($hasil && $hasil->num_rows > 0) {
            $user = $hasil->fetch_assoc();
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                $_SESSION ['login'] = "masuk";
                session_start();
                echo "<script>alert('Anda berhasil login sebagai admin'); window.location.href = 'dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Login gagal, email atau password salah'); window.location.href = 'login.php';</script>";
            exit;
  }
}
?>