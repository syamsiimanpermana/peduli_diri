<?php

session_start();

$nik = $_SESSION["nik"];
$nama = $_SESSION["nama"];
$tanggal = $_POST["tanggal"];
$jam = $_POST["jam"];
$lokasi = $_POST["lokasi"];
$suhu = $_POST["suhu"];
$id = uniqid();

$format = "\n$id|$nik|$nama|$tanggal|$jam|$lokasi|$suhu|belum";

// buka file catatan.txt 
$file = fopen("data/catatan.txt", "a");
fwrite($file, $format);

fclose($file);

echo"
    <script>
    alert('data berhasil di simpan');
    window.location.assign('index.php?url=lihat-catatan');
    </script>
    ";