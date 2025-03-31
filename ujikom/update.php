<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cari = "SELECT * FROM produk WHERE id_brg = $id";
    $hasil = mysqli_query($koneksi, $cari);

    if (mysqli_num_rows($hasil) == 1) {
        $data = mysqli_fetch_assoc($hasil);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='dataproduk.php';</script>";
        exit();
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];


    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($file_tmp, 'image/' . $gambar);
    } else {
        $gambar = $data['gambar'];
    }


    $query = "UPDATE produk SET nm_brg='$nama', hrg_brg='$harga', jenis='$jenis', gambar='$gambar' WHERE id_brg='$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='dataproduk.php';</script>";
    } else {
        echo "Gagal memperbarui produk: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Produk</title>
</head>
<style>
    .container {
        border: 3px solid white;
        background-color: transparent;
        height: 560px;
        width: 500px;
        align-items: center;
        justify-content: center;
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 80%;
        left: 50%;
        text-align: center;
    }

    input {
        background-color: transparent;
        color: white;
    }

    .balik {
        margin-left: 800px;
    }
    select {
        color: black;
        background-color: transparent;
        border: 2px solid white;
        border-radius: 10px;
        width: 300px;
        height: 45px;
    }

    select option{  
        color: white;
        background-color: black;
    }
    input, select, ::placeholder {
        background-color: transparent;
        color: white;
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
<svg viewbox="0 0 2400 500">
    <text x="50%" y="59%" text-anchor="middle">EDIT PRODUK</text> 
</svg>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <h1>Edit Produk</h1>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id_brg']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Produk:</td>
                    <td class="input"><input type="text" name="nama" value="<?php echo $data['nm_brg']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Produk:</td>
                    <td class="input"><input type="text" name="harga" value="<?php echo $data['hrg_brg']; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis:</td>
                <td>
                    <select name="jenis" id="jenis" value="<?php echo $data['jenis']; ?>" required>
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Sabun">Sabun</option>
                        <option value="Perawatan">Perawatan</option>
                    </select>
                </td>
            </tr>
                <tr>
                    <td>Gambar Produk:</td>
                    <td>
                        <input type="file" name="gambar" id="gambar">
                        <img src="image/<?php echo $data['gambar']; ?>" alt="Gambar Produk" style="max-width: 100px;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit" class="button">Simpan</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>