<h2 class="heading">tulis catatan perjalanan</h2>
       <form class="tulis-catatan" action="simpan_catatan.php" method="post">
         <div class="box">
           <label for="tanggal">tanggal :</label>
           <input type="date" name="tanggal" id="tanggal" required>
         </div>
         <div class="box">
           <label for="jam">jam :</label>
           <input type="time" name="jam" id="jam" required>
         </div>
         <div class="box">
           <label for="lokasi">lokasi :</label>
           <input type="text" name="lokasi" id="lokasi" placeholder="lokasi tujuan anda" required>
         </div>
         <div class="box">
           <label for="suhu">suhu tubuh :</label>
           <input type="text" name="suhu" id="suhu" placeholder="masukan suhu tubuh anda" required>
         </div>
         <button class="btn submit-btn" type="submit"><i class="fas fa-save"></i> simpan </button>
       </form>