<?php
session_start();
require "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM guru 
              WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        $_SESSION['login'] = true;
        $_SESSION['nama_guru'] = $data['nama_guru'];

        header("Location: HalamanGuru.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Guru</title>
  <link rel="stylesheet" href="StyleGuru.css">
</head>
<body>

<div class="container">
  <h2>Login Guru</h2>

  <?php if (isset($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
  <?php } ?>

 <form method="POST" autocomplete="off">
  <label>Username</label><br>
  <input
    type="text"
    name="username"
    autocomplete="off"
    required
  ><br><br>

  <label>Password</label><br>
  <input
    type="password"
    name="password"
    autocomplete="new-password"
    required
  ><br><br>

  <input type="submit" name="login" value="Login">
  <button type="button" onclick="history.back()">← Kembali</button>
</form>

</div>

</body>
</html>
