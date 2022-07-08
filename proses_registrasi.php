<?php

$nama = $_POST["nama"];
$nik = $_POST["nik"];
$cek = '';


// cek apakah nik sudah terdaftar / belum 
$data = file("data/config.txt", FILE_IGNORE_NEW_LINES);

foreach($data as $value){
    $pecah = explode("|", $value);

    if($nik == $pecah["0"]){
        $cek = true;
    }
}

if($cek){
    // jika sudah terdaftar 
    echo"
    <script>
    alert('maaf. nik yang anda masukan sudah terdaftar');
    window.location.assign('registrasi.php');
    </script>
    ";
}else{
    // jika nik belum terdaftar 
    // format penyimpanan ke config.txt 
    $format = "\n$nik|$nama";

    // buka file config 
    $file = fopen("data/config.txt","a");
    fwrite($file, $format);
    // tutup file 
    fclose($file);

    echo"
    <script>
    alert('pendaftaran berhasil di lakukan');
    window.location.assign('login.php');
    </script>
    ";
}
?>