<?php 
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");
  
  // ambil data dari tabel mahasiswa / query data mahasiswa
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
  // cek error
  // if (!$result) {
  //   echo mysqli_error($conn);
  // }
  
  // ambil data (fetch) mahasiswa dari object result
  // mysqli_fetch_row() => mengembalikan array numerik
  // mysqli_fetch_assoc() => mengembalikan array assoc
  // mysqli_fetch_array() => mengembalikan keduanya (jadi dobel)
  // mysqli_fetch_object() => mengembalikan objek

  // while($mhs = mysqli_fetch_assoc($result)){
  //   var_dump($mhs['nama']);
  // }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Daftar Mahasiswa</h1>

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
      <?php 
      $i = 1;
      while ( $row = mysqli_fetch_assoc($result)){ ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="">ubah</a>
          <a href="">hapus</a>
        </td>
        <td><img src="img/<?= $row['gambar']; ?>" alt="" width="60px" /></td>
        <td><?= $row['nrp']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['jurusan']; ?></td>
      </tr>
      <?php $i++; } ?>
    </table>
  </body>
</html>
