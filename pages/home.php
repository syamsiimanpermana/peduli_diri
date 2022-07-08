<?php
   $data = file("./data/catatan.txt", FILE_IGNORE_NEW_LINES);
   $no = 1;
   $jumlah = 0;
   $jumlahselesai = 0;
   $belumselesai = 0;

   foreach($data as $value ){
    
      $pecah = explode("|", $value);
      $user = $_SESSION["nik"]. '|' .$_SESSION["nama"];
      $key = @$pecah['1']. "|" .@$pecah['2']; //buat keynya 
      
      if($key === $user){
       $jumlah ++;
       $selesai = trim(end($pecah));

      if($selesai === "selesai"){
         $jumlahselesai ++;
      }else{
         $belumselesai ++;
      }

      }
   }

?> 
 
 <h2>hallo, <?= $_SESSION["nama"];?></h2>
       <div class="overview">
           <div class="box">
              <h2 class="total"><?= $belumselesai; ?></h2>
              <p class="title">belum di selesaikan</p>
           </div>
           <div class="box">
            <h2 class="total"><?= $jumlahselesai; ?></h2>
            <p class="title">telah di selesaikan</p>
         </div>
         <div class="box">
            <h2 class="total"><?= $jumlah; ?></h2>
            <p class="title">semua total tugas</p>
         </div>
       </div>

       <h2>riwayat perjalanan</h2>

       <div class="main-table">
       <table cellpadding="20" cellspacing="20" class="daftar-catatan">
    <thead>
        <tr>
            <th>no</th>
            <th>lokasi</th>
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
            <?php if($key === $user && $pecah['7'] == 'selesai') :?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $pecah['5']?></td>
                    <td><?= $pecah['3']?></td>
                    <td><?= $pecah['4']?></td>
                    <td><?= $pecah['6']?></td>
                    <td><a href="./pages/hapus.php?id=<?= $pecah['0']?>" style="color: rgb(250, 71, 71); font-size: 20px;" onclick="return confirm('apakah kamu yakin ingin menghapus nya') "><i class="fas fa-trash"></i></a></td>
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