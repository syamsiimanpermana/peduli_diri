<?php
$no = 0;
$id = $_GET["id"];
$data = file("../data/catatan.txt", FILE_IGNORE_NEW_LINES);

foreach($data as $value){
    $no++;

    $pecah = explode("|", $value);

    if($pecah['0'] === $id){
        $line = $no - 1; //mengetahui data baris ke berapa
    }
}

$file = file("../data/catatan.txt");

unset($file[$line]);
file_put_contents("../data/catatan.txt", implode("", $file));
echo"
    <script>
    alert('satu data berhasil di hapus');
    window.location.assign('../index.php?url=home');
    </script>
    ";
