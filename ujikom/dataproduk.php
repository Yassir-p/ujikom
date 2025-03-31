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
    .jarak {
        margin-top: 80px;
    }

    table {
        border: 2px solid white;
        border-collapse: collapse;
        color: white;
        border-spacing: 0;
        width: 70%;
        margin: 100px auto 10px auto;
    }
    table th {
        background-color: transparent;
        border: 2px solid white;
        color: white;
        padding: 7px;
    }
    table td {
        text-align: center;
        border: 2px solid white;
    }
    a {
        border-radius: 5px;
        align-items: center;
        text-align: center;
        border-color: white;
        border: 2px solid white;
        text-decoration: none;
        color: white;
        width: 85px;
        height: 40px;
        justify-content: center;
    }
    img {
        width: 100px;
        height: auto;
        border-radius: 5px;
        margin: 10px;
    }
    .balik {
        margin-left: 800px;
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
            <text x="50%" y="60%" text-anchor="middle">DAFTAR PRODUK</text> 
        </svg>
    </div>

    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>

        <?php
        include "koneksi.php";
        $query = "SELECT * FROM produk";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die ("Query error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }
        $no = 1;

        while ($baris = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $baris['nm_brg']; ?></td>
            <td><?php echo $baris['hrg_brg']; ?></td>
            <td><?php echo $baris['jenis']; ?></td>
            <td><img src="image/<?php echo $baris['gambar']; ?>"></td>
            <td>
                <a href="update.php?id=<?php echo $baris['id_brg']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $baris['id_brg']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        $no++;
        }
        ?>
    </table>
</body>
</html>