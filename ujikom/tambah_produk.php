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
    <title>Tambah Produk</title>
</head>
<style>
    .balik {
        margin-left: 800px;
    }
    select {
        color: black;
        background-color: transparent;
        border: 2px solid white;
        border-radius: 10px;
        width: 326px;
        height: 45px;
    }

    select option{  
        color: white;
        background-color: black;
    }

    .td-kiri {
        text-align: left;
    }

    input, select, ::placeholder {
        background-color: transparent;
        color: white;
    }
    .container2 {
    border: 3px solid white;
    background-color: transparent;
    height: 450px;
    width: 380px;
    justify-content: center;
    align-items: center;
    text-align: center;
    display: flex;  
    flex-direction: column;
    border-radius: 10px;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 75%;
    left: 50%;
    }
</style>
<body>
<header>
        <img src="image/Wahyep.png" alt="logo" class="image">
        <div class="balik">
            <a href="dashboard.php" class="login2">KEMBALI</a>  
        </div>
        <div>
            <a href="logout.php" class="login2">LOG OUT</a>
        </div>
</header>
    <div>
        <svg viewbox="0 0 2400 500">
            <text x="50%" y="60%" text-anchor="middle">TAMBAH PRODUK</text> 
        </svg>
    </div>
    
    <div class="container2">
    <form action="tambah_produk.php" method="post" enctype="multipart/form-data">
        <table>
            <h1>TAMBAH PRODUK</h1>
            <div class="input">
                <input type="text" name="nama" id="nama" required>
                <label for="nama">Nama Produk</label>
            </div>
            <div class="input">
                <input type="text" name="harga" id="harga" required>
                <label for="harga">Harga Produk</label>
            </div>
            <tr>
                <td colspan="2"><select name="jenis" id="jenis" required>
                    <option value="" disabled selected>Pilih Jenis</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Sabun">Sabun</option>
                    <option value="Perawatan">Perawatan</option>
                </select></td>
            </tr>
            <tr>
                <td>Gambar:</td>
                <td><input type="file" name="gambar" id="gambar" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit" class="button">Simpan</button></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>

<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $gambar = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($file_tmp, 'image/'.$gambar);

    $query = "INSERT INTO produk VALUES ('', '$nama', '$harga', '$jenis', '$gambar')";
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    if (!$result) {
        echo "";
    } else {
        echo "<script>alert('Berhasil menambahkan produk!'); window.location.href='dataproduk.php';</script>";
        exit();
    }
}
?>