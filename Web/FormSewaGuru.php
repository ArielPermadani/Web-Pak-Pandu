<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Latihan 4</title>

    <link rel="stylesheet" href="StyleGuru.css" />
  </head>

  <body>
    <nav class="sidebar">
      <h2>GuruKu</h2>
      <ul>
       <li><a href="Guru.html">Beranda</a></li>
        <li><a href="Halaman2.html">Daftar Guru</a></li>
        <li><a href="Table.html">Informasi Jam Mengajar</a></li>
        <li><a href="FormSewaGuru.php">Daftar Les Privat</a></li>
        <li><a href="Frame.html">Galeri Dan Testimoni siswa</a></li>
        <li><a href="About Us.html">Tentang Kami</a></li>
        <li><a href="CS.html">Custome Service</a></li>
         <li><a href="LoginGuru.php">Halaman Khusus Guru</a></li>
      </ul>
    </nav>

    <div class="container">
    <form action="simpan.php" method="POST">
  <h2>FORM PEMESANAN GURU LES PRIVAT</h2>

  <label for="nama">Nama:</label><br />
  <input type="text" id="nama" name="nama" required /><br /><br />

  <label for="no_hp">No HP:</label><br />
  <input
    type="tel"
    id="no_hp"
    name="no_hp"
    placeholder="08xxxxxxxxxx"
    required
  /><br /><br />

  <label for="alamat">Alamat:</label><br />
  <textarea
    id="alamat"
    name="alamat"
    rows="3"
    cols="30"
    placeholder="Masukkan alamat lengkap"
    required
  ></textarea>
  <br /><br />

  <label for="tanggal">Tanggal:</label><br />
  <input type="date" id="tanggal" name="tanggal" required /><br /><br />

  <label for="guru">Pengajar (Nama Guru):</label><br />
<select id="guru" name="nama_guru" required>
  <option value="">-- Pilih Guru --</option>

  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM data_guru");
  while ($row = mysqli_fetch_assoc($query)) {
      echo "<option value='{$row['nama_guru']}'>
              {$row['nama_guru']}
            </option>";
  }
  ?>
</select>
<br /><br />
  <label for="jam">Jadwal:</label><br />
  <input type="time" id="jam" name="jadwal" required /><br /><br />

  <input type="submit" value="Kirim" />
</form>

      <div style="text-align: center; margin-top: 15px"></div>
    </div>
  </body>
</html>
