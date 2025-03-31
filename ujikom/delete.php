<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = "DELETE FROM produk WHERE id_brg = $id";

    if (mysqli_query($koneksi, $delete)) {
        echo "<script>alert('Data has been deleted!'); window.location='dataproduk.php';</script>";
    } else {
        echo "<script>error('Failed to delete data!'); window.location='dataproduk.php';</script>";
    }
}