<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>WahYep</title>
</head>
<style>
    .jarak {
        margin-top: 80px;
    }
</style>
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

    <div>
        <svg viewbox="0 0 2400 500">
            <text x="50%" y="60%" text-anchor="middle">DAFTAR PRODUK</text> 
        </svg>
    </div>

<?php
include "koneksi.php";
$query = $koneksi->query("SELECT * FROM produk");
?>
    <div class="jarak">
    <div class="produk">
            <?php if ($query->num_rows > 0) {
                while ($data = $query->fetch_assoc()) {
                ?>
                    <div class="item">
                            <img src="image/<?= $data['gambar'];?>" alt="">
                            <p><?= $data['nm_brg'];?></p>
                            <p><?= $data['hrg_brg'];?></p>
                            <p><?= $data['jenis'];?></p>
                    </div>
            <?php    }?>
        <?php   } else {
                echo "Tidak ada data";
           } ?>
    </div>
</body>
</html>