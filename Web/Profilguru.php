<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: LoginGuru.php");
    exit;
}

$idGuru = $_SESSION['id_guru'];


if (isset($_POST['simpan'])) {
    $mapel       = $_POST['mata_pelajaran'];
    $harga       = $_POST['harga_perjam'];
    $pengalaman  = $_POST['pengalaman'];
    $tempat      = $_POST['tempat'];
    $keterangan  = $_POST['keterangan'];

    mysqli_query($koneksi,
        "UPDATE data_guru SET
            mata_pelajaran='$mapel',
            harga_perjam='$harga',
            pengalaman='$pengalaman',
            tempat='$tempat',
            keterangan='$keterangan'
         WHERE id_guru='$idGuru'"
    );

    header("Location: ProfilGuru.php");
    exit;
}

/* AMBIL DATA GURU */
$q = mysqli_query($koneksi,
    "SELECT * FROM data_guru WHERE id_guru='$idGuru'"
);
$guru = mysqli_fetch_assoc($q);

$edit = isset($_GET['edit']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Guru</title>
<style>
    /* ================== RESET ================== */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}

body {
  display: flex;
  min-height: 100vh;
  background: #f4f6fb;
  color: #333;
}

/* ================== SIDEBAR ================== */
.sidebar {
  width: 240px;
  background: linear-gradient(180deg, #667eea, #764ba2);
  color: #fff;
  padding: 30px 20px;
  position: fixed;
  height: 100%;
}

.sidebar h2 {
  text-align: center;
  margin-bottom: 40px;
  font-size: 24px;
  letter-spacing: 1px;
}

.sidebar ul {
  list-style: none;
}

.sidebar ul li {
  margin-bottom: 15px;
}

.sidebar ul li a {
  display: block;
  padding: 12px 16px;
  border-radius: 12px;
  text-decoration: none;

  transition: 0.3s;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
  background: rgba(255, 255, 255, 0.25);
}

/* ================== CONTENT ================== */
.container {
  margin-left: 260px;
  padding: 40px;
  width: 100%;
}

.container h2 {
  font-size: 26px;
  margin-bottom: 25px;
  color: #4b0082;
}

/* ================== TABLE PROFIL ================== */
table {
  width: 100%;
  max-width: 700px;
  background: #fff;
  border-radius: 16px;
  padding: 20px;
  box-shadow: 0 15px 35px rgba(0,0,0,.08);
}

table tr td:first-child {
  width: 180px;
  font-weight: 600;
  vertical-align: top;
  padding-top: 12px;
}

table td {
  padding: 10px 5px;
}

/* ================== INPUT ================== */
input[type="text"],
input[type="number"],
textarea {
  width: 100%;
  padding: 10px 14px;
  border-radius: 10px;
  border: 1px solid #ccc;
  outline: none;
  transition: 0.3s;
}

textarea {
  resize: vertical;
  min-height: 80px;
}

input:focus,
textarea:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 2px rgba(102,126,234,.2);
}

/* ================== BUTTON ================== */
button,
a {
  display: inline-block;
  padding: 10px 18px;
  border-radius: 12px;
  border: none;
  text-decoration: none;
  cursor: pointer;
  transition: 0.25s;
  font-weight: 500;
}

button {
  background: linear-gradient(135deg, #667eea, #764ba2);
  color: #fff;
}

button:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 25px rgba(0,0,0,.25);
}

a {
  background: #e5e7eb;
  color: #333;
  margin-left: 10px;
}

a:hover {
  background: #d1d5db;
}

/* ================== MOBILE ================== */
@media (max-width: 768px) {
  body {
    flex-direction: column;
  }

  .sidebar {
    position: relative;
    width: 100%;
    height: auto;
    border-radius: 0 0 20px 20px;
  }

  .container {
    margin-left: 0;
    padding: 25px;
  }

  table {
    width: 100%;
  }

  table tr td:first-child {
    width: 140px;
  }
}

</style>
</head>
<body>

<nav class="sidebar">
    <h2>GuruKu</h2>
    <ul>
    <li><a href="HalamanGuru.php">Jadwal Les</a></li>
     <li><a href="Profilguru.php">Profil</a></li>
    <li>
      <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">
        Logout
      </a>
    </li>
  </ul>
</nav>

<div class="container">
<h2>Profil Guru</h2>

<form method="POST">
<table cellpadding="10">

<tr>
<td><b>Nama Guru</b></td>
<td>: <?= $guru['nama_guru']; ?></td>
</tr>

<tr>
<td><b>Mata Pelajaran</b></td>
<td>:
<?php if ($edit) { ?>
<input type="text" name="mata_pelajaran"
       value="<?= $guru['mata_pelajaran']; ?>" required>
<?php } else { ?>
<?= $guru['mata_pelajaran']; ?>
<?php } ?>
</td>
</tr>

<tr>
<td><b>Tarif Per Jam</b></td>
<td>:
<?php if ($edit) { ?>
<input type="number" name="harga_perjam"
       value="<?= $guru['harga_perjam']; ?>" required>
<?php } else { ?>
Rp <?= number_format($guru['harga_perjam'],0,',','.'); ?>
<?php } ?>
</td>
</tr>

<tr>
<td><b>Pengalaman</b></td>
<td>:
<?php if ($edit) { ?>
<input type="number" name="pengalaman"
       value="<?= $guru['pengalaman']; ?>" required> tahun
<?php } else { ?>
<?= $guru['pengalaman']; ?> tahun
<?php } ?>
</td>
</tr>

<tr>
<td><b>Tempat Mengajar</b></td>
<td>:
<?php if ($edit) { ?>
<input type="text" name="tempat"
       value="<?= $guru['tempat']; ?>" required>
<?php } else { ?>
<?= $guru['tempat']; ?>
<?php } ?>
</td>
</tr>

<tr>
<td><b>Keterangan</b></td>
<td>:
<?php if ($edit) { ?>
<textarea name="keterangan" required><?= $guru['keterangan']; ?></textarea>
<?php } else { ?>
<?= $guru['keterangan']; ?>
<?php } ?>
</td>
</tr>

</table>

<br>

<?php if ($edit) { ?>
<button type="submit" name="simpan">💾 Simpan</button>
<a href="ProfilGuru.php">Batal</a>
<?php } else { ?>
<a href="ProfilGuru.php?edit=1">✏️ Edit Profil</a>
<?php } ?>

</form>

</div>
</body>
</html>
