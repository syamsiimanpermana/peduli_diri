<?php


$nama = $_POST["nama"];
$nik = $_POST["nik"];


$format =trim("\n$nik|$nama");
$data = file("data/config.txt", FILE_IGNORE_NEW_LINES);

// jika data di temukan
if(in_array($format, $data)){
    
    session_start();
    $_SESSION["nik"] = $nik;
    $_SESSION["nama"] = $nama;

    header("location:index.php?url=home");
}else{
    echo"
    <script>
    alert('maaf, nik atau nama yang anda masukan salah');
    window.location.assign('login.php');
    </script>
    ";
}
?>