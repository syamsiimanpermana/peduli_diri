<?php
$no = 1;
$data = file("./data/catatan.txt", FILE_IGNORE_NEW_LINES);
?>

<h2>daftar catatan perjalanan</h2>
<div class="search-container">
    <div class="wrapper">
        <input id="search" class="search" placeholder="ketik untuk mencari data" type="text" required>
        <label for="search" id="tmbl-search"><i class="fas fa-search"></i></label>
    </div>
</div>
<div class="main-table">
<table class="daftar-catatan">
    <thead>
        <tr>
            <th>no</th>
            <th class="sort th-sort-asc">lokasi</th>
            <th>tanggal</th>
            <th>jam</th>
            <th>suhu tubuh</th>
            <th>aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($data as $value) : ?>
        <?php 
            $pecah = explode("|", $value); //pisahkan tanda |
            $user = $_SESSION["nik"]. '|' .$_SESSION["nama"];
            $key = @$pecah["1"]. "|" .@$pecah["2"]; //buat keynya 
            ?>
            <?php if($key === $user && $pecah['7'] == 'belum') :?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $pecah['5']?></td>
                    <td><?= $pecah['3']?></td>
                    <td><?= $pecah['4']?></td>
                    <td><?= $pecah['6']?></td>
                    <td><a href="./pages/edit.php?id=<?= $pecah['0']?>" class="btn">selesai</a></td>
                </tr>
            <?php endif;?>
        <?php endforeach;?>
        <?php if($no === 1) :?>
            <tr>
                <td colspan="6" style="color: rgb(39, 39, 39); text-align:center;">data catatan masih kosong</td>
            </tr>
        <?php endif;?>
    </tbody>
</table>
</div>