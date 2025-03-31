<?php
session_start();
session_destroy();

echo "<script>alert('Berhasil log out!'); window.location.href = 'login.php'; window.close();</script>";
?>