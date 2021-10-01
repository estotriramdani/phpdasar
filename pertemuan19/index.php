<?php 
  
  session_start();

  if (!isset($_SESSION['login'])) {
    header("Location: login.php");
  }

  require 'functions.php';
  $mahasiswa = query("SELECT * FROM mahasiswa");
  
  // tombol cari ditekan
  if (isset($_POST['cari'])){
    $mahasiswa = cari($_POST["keyword"]);
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a> 
    <form action="" method="post">
      <input type="text" name="keyword" id="keyword" size="40" autofocus="autofocus" placeholder="Masukkan keyword" autocomplete="off" id="keyword">
      <button name="cari" id="tombol-cari">Cari</button>
    </form>

    <br>
    <div id="container">
      <table border="1" cellpadding="10" cellspacing="0">
        <tr>
          <th>No.</th>
          <th>Aksi</th>
          <th>Gambar</th>
          <th>NRP</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $mahasiswa as $row ) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td>
            <a href="ubah.php?id=<?= $row['id']; ?>">ubah</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">hapus</a>
          </td>
          <td><img src="img/<?= $row['gambar']; ?>" alt="" width="60px" /></td>
          <td><?= $row['nrp']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['jurusan']; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </table>
    </div>
    <script src="js/script.js">
        
    </script>
  </body>
</html>