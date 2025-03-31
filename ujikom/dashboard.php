<?php
session_start();
if(empty($_SESSION['login'])) {
    header ("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>WahYep</title>
</head>
<style>
    header {
        display: flex;
        justify-content: space-between;
    }

    a {
        border: 3px solid white;
        background-color: transparent;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 160px;
        height: 60px;
        margin: 15px;
        text-decoration: none;
        color: white;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.2s;
    }
    .kotak2 {
        border-radius: 15px;
        justify-content: center;
        display: flex;
        align-items: center;
        width: 190px;
        height: 70px;
        text-align: center;
        margin-top: 150px;
        margin-left: 530px;
        cursor: pointer;
    }
    .kotak3 {
        border-radius: 15px;
        justify-content: center;
        display: flex;
        align-items: center;
        width: 190px;
        height: 70px;
        text-align: center;
        margin-top: 20px;
        margin-left: 530px;
        cursor: pointer;
  }
  
</style>
<body>
    <header>
        <img src="image/Wahyep.png" alt="logo" class="image">
        <div>
            <a href="logout.php" class="login2">LOG OUT</a>
        </div>
    </header>
    <div>
        <svg viewbox="0 0 2400 600">
            <text x="50%" y="70%" text-anchor="middle">SELAMAT DATANG DI</text> 
            <text x="50%" y="90%" text-anchor="middle">DASHBOARD ADMIN!</text> 
        </svg>
    </div>

        <div class="kotak2">
            <a href="dataproduk.php">DATA PRODUK</a>
        </div>
        <div class="kotak3">
            <a href="tambah_produk.php">TAMBAH PRODUK</a>
        </div>
    </div>
</body>
</html>