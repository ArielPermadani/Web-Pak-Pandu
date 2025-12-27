<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: LoginGuru.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman Guru</title>
  <link rel="stylesheet" href="StyleGuru.css">
</head>
<body>

<nav class="sidebar">
  <h2>GuruKu</h2>
  <ul>
    <li><a href="HalamanGuru.php">Jadwal Les</a></li>
    <li><a href="logout.php" 
   onclick="return confirm('Apakah Anda yakin ingin logout?')">
   Logout
</a></li>
  </ul>
</nav>

<div class="container">
  <h2>Selamat Datang, <?php echo $_SESSION['nama_guru']; ?></h2>
  <p>Berikut adalah daftar jadwal les yang tersedia.</p>

  <table border="1" cellpadding="8" cellspacing="0" width="100%">
  <tr>
    <th>Nama Siswa</th>
    <th>No HP</th>
    <th>Alamat</th>
    <th>Jam</th>
  </tr>

   <?php
$nama_guru = $_SESSION['nama_guru'];

$query = "SELECT * FROM pemesanan 
          WHERE nama_guru = '$nama_guru'
          ORDER BY tanggal, jadwal";

$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['no_hp']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['jadwal']}</td>
              </tr>";
    }
} else {
    echo "<tr>
            <td colspan='4' align='center'>
              Belum ada pesanan untuk Anda
            </td>
          </tr>";
}
?>
  </table>
</div>

</body>
</html>
