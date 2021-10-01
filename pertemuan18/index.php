<?php 
  
  session_start();

  if (!isset($_SESSION['login'])) {
    header("Location: login.php");
  }

  require 'functions.php';

  // pagination
  // konfigurasi
  $jumlahDataPerhalaman = 2;
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
  $jumlahData = mysqli_num_rows($result);
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
  $halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1 );
  $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

  
  $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");
  
  // tombol cari ditekan
  if (isset($_POST['cari'])){
    $mahasiswa = cari($_POST["keyword"]);
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");
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
      <input type="text" name="keyword" id="keyword" size="40" autofocus="autofocus" placeholder="Masukkan keyword" autocomplete="off">
      <button name="cari">Cari</button>
    </form>
    
    <br>
    
    <!-- Navigasi -->

    <?php if($halamanAktif > 1): ?>
      <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
      <?php if($i == $halamanAktif): ?>
        <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
      <?php else: ?>
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman): ?>
      <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;;</a>
    <?php endif; ?>

    <br>
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
  </body>
</html>