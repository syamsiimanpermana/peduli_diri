<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Daftar || peduli diri</title>
  </head>
  <body>
    <div class="container">
      <div class="image">
        <img src="img/autentikasi.png" alt="bg" />
      </div>
      <div class="login-form">
        <div class="heading">
          <h1>DAFTAR</h1>
          <p>sudah punya akun ? <a href="login.php">login</a></p>
        </div>
        <form action="proses_registrasi.php" method="post">
          <div class="input-box">
            <input type="text" id="username" name="nama" required autocomplete="off" />
            <label for="username">nama :</label>
          </div>
          <div class="input-box">
            <input type="text" name="nik"  required id="nik" />
            <label for="nik">nik :</label>
          </div>
          <button class="btn submit" type="submit">daftar</button>
        </form>
      </div>
    </div>
  </body>
</html>
