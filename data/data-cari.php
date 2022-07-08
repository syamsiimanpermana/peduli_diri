<?php
session_start();
$keyword = $_GET["keyword"];
$no = 1;
$data = file("catatan.txt", FILE_IGNORE_NEW_LINES);
foreach($data as $value){
    $pecah = explode("|", $value); //pisahkan tanda |
    $user = $_SESSION["nik"]. '|' .$_SESSION["nama"];
    $key = @$pecah["1"]. "|" .@$pecah["2"]; //buat keynya 
    similar_text($keyword, @$pecah['5'], $percent); //cek kemiripan keyword
    number_format($percent); //ubah ke integer

    if($key === $user && $pecah['7'] == 'belum' && $percent >= 25 || $percent === 100){
        ?>
    <tr>
        <td><?= $no++?></td>
        <td><?= $pecah['5']?></td>
        <td><?= $pecah['3']?></td>
        <td><?= $pecah['4']?></td>
        <td><?= $pecah['6']?></td>
        <td><a href="./pages/edit.php?id=<?= $pecah['0']?>" class="btn">selesai</a></td>
    </tr>
<?php
    }
}
if($no === 1){
    ?>

    <tr>
        <td colspan="6" style="color: rgb(39, 39, 39); text-align:center;">maaf, data yang kamu cari tidak ada (<a href="">muat ulang</a>)</td>
    </tr>

<?php
}
?>