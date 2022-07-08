<?php
session_start(); 

if(empty($_SESSION["nik"])){
  header("location:login.php");
}

function cekurl($url){
  $currenturl = $_GET["url"];

  if($currenturl === $url){
    return "active";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="fonts/fontawesome/css/all.css" />
    <link rel="stylesheet" href="Poppins/Poppins-Medium.ttf">
    <link rel="stylesheet" href="css/main.css">
    <title>peduli diri</title>
  </head>
  <body>
  <div class="nav">
        <div class="icon">
            <i class="fas fa-book"></i> peduli diri
        </div>
      <ul class="menu">
        <li>
          <a href="?url=home" class="<?= cekurl("home")?>">
            <i class="fas fa-home"></i> beranda
          </a>
        </li>
        <li>
          <a href="?url=tulis-catatan" class="<?= cekurl("tulis-catatan")?>">
            <i class="fa-solid fa-pen"></i> tulis catatan
          </a>
        </li>
        <li>
          <a href="?url=lihat-catatan" class="<?= cekurl("lihat-catatan")?>">
            <i class="fas fa-bookmark"></i> lihat catatan
          </a>
        </li>
      </ul>

      <a href="logout.php" class="logout-btn">
        <i class="fa-solid fa-power-off"></i> logout
      </a>
    </div>
    <div class="container">

      <?php
      if(isset($_GET["url"])){
        switch($_GET["url"]){
          case "tulis-catatan":
            include "pages/tulis-catatan.php";
            break;
          case "lihat-catatan":
            include "pages/lihat-catatan.php";
            break;
          case "home":
            include "pages/home.php";
            break;
          default :
              echo "<h1>halaman tidak di temukan</h1>";
        }
      }else{
        echo "<h1>maaf halaman yang anda cari tidak tersedia</h1>";
      }
      
      ?>       
    </div>

    <div class="navbar-bottom">
      <a href="?url=home"><i class="fas fa-home <?= cekurl("home")?>"></i></a>
      <a href="?url=tulis-catatan"><i class="fa-solid fa-pen <?= cekurl("tulis-catatan")?>"></i></a>
      <a href="?url=lihat-catatan"><i class="fa-solid fa-bookmark <?= cekurl("lihat-catatan")?>"></i></a>
      <a href="logout.php"><i class="fa-solid fa-power-off"></i></a>
    </div>

    
    <script src="js/main.js"></script>
  </body>
</html>
