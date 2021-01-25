<?php 
  require "functions.php"; 

    // ambil data di URL 
    $id = $_GET['id'];
  
    // query data mahasiswa berdasarkan ID
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
    // apakah tombol submit sudah ditekan
if (isset($_POST["submit"])){

  // cek apakah data berhasil diubah atau tidak
  if ( ubah($_POST) > 0 ) {
    echo "<script>alert('Data berhasil diubah'); document.location.href = 'index.php'</script>";
  } else {
    echo "<script>alert('Data gagal diubah'); document.location.href = 'index.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>
<body>
  <h1>Ubah Data Mahasiswa</h1>

  <form method="post" action="">
    <ul>
      <li>
        <label for="nrp">NRP: </label>
        <input value="<?= $mhs["nrp"]; ?>" type="text" required name="nrp" id="nrp">
      </li>
      <li>
        <label for="nama">Nama: </label>
        <input value="<?= $mhs["nama"]; ?>" type="text" required name="nama" id="nama">
      </li>
      <li>
        <label for="email">Email: </label>
        <input value="<?= $mhs["email"]; ?>" type="email" required name="email" id="email">
      </li>
      <li>
        <label for="jurusan">jurusan: </label>
        <input value="<?= $mhs["jurusan"]; ?>" type="text" required name="jurusan" id="jurusan">
      </li>
      <li>
        <label for="gambar">Gambar: </label>
        <input value="<?= $mhs["gambar"]; ?>" type="text" required name="gambar" id="gambar">
      </li>
      <input type="hidden" name="id"  value="<?= $mhs['id']; ?>">
      <li>
        <button type="submit" name="submit">Ubah Data</button>
      </li>
    </ul>
  </form>
</body>
</html>