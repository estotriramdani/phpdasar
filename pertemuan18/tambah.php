<?php 
  session_start();

  if (!isset($_SESSION['login'])) {
    header("Location: login.php");
  }

require "functions.php"; 
// apakah tombol submit sudah ditekan
if (isset($_POST["submit"])){
  // cek apakah data berhasil ditambahkan atau tidak
  if ( tambah($_POST) > 0 ) {
    echo "<script>alert('Data berhasil ditambahkan'); document.location.href = 'index.php'</script>";
  } else {
    echo "<script>alert('Data gagal ditambahkan'); document.location.href = 'index.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>
<body>
  <h1>Tambah Data Mahasiswa</h1>

  <form method="post" action="" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="nrp">NRP: </label>
        <input type="text" required name="nrp" id="nrp">
      </li>
      <li>
        <label for="nama">Nama: </label>
        <input type="text" required name="nama" id="nama">
      </li>
      <li>
        <label for="email">Email: </label>
        <input type="email" required name="email" id="email">
      </li>
      <li>
        <label for="jurusan">jurusan: </label>
        <input type="text" required name="jurusan" id="jurusan">
      </li>
      <li>
        <label for="gambar">Gambar: </label>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Submit</button>
      </li>
    </ul>
  </form>
</body>
</html>