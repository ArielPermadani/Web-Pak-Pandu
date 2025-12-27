<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama       = $_POST['nama'];
    $no_hp      = $_POST['no_hp'];
    $alamat     = $_POST['alamat'];
    $tanggal    = $_POST['tanggal'];
    $nama_guru  = $_POST['nama_guru'];
    $jadwal     = $_POST['jadwal'];

    $query = "INSERT INTO pemesanan 
              (nama, no_hp, alamat, tanggal, nama_guru, jadwal)
              VALUES 
              ('$nama', '$no_hp', '$alamat', '$tanggal', '$nama_guru', '$jadwal')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: FormSewaGuru.php?status=sukses");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
