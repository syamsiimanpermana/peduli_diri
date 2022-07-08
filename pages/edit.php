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

$format = "$pecah[0]|$pecah[1]|$pecah[2]|$pecah[3]|$pecah[4]|$pecah[5]|$pecah[6]|selesai";
$data[$line] = $format;
$data = implode("\n", $data);
file_put_contents("../data/catatan.txt", $data);
echo"
    <script>
    alert('Horeee..., satu tugas berhasil di selesaikan');
    window.location.assign('../index.php?url=home');
    </script>
    ";
?>

