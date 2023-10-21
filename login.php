<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_username = "SELECT * FROM worker WHERE username = '$username'";
    $result = mysqli_query($conn, $cek_username);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;

            echo "<script>
                alert('Login berhasil!');
                document.location.href = 'index.php';
            </script>";
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Login</title>
</head>

<body id="badan">
    <div class="kotak_login">
    <p class="tulisan_login"><b>Silahkan login</b></p>
    <?php if (isset($error)) : ?>
        <p style="color: #FF6D6D; font-weight:600;">Username/Password Salah!</p>
    <?php endif; ?>
    <br>
    <form action="" method="post">
        <label for="username">Username</label><br>
        <input type="text" class="form_update" name="username" placeholder="username" id="username" autocomplete="off" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" class="form_update" name="password" placeholder="password" id="password" autocomplete="off" required><br><br>
        <center>
        <button type="submit" name="regist" class="tombol_login"><a href="registrasi.php">Daftar Akun</a></button><br><br>
        <button type="submit" name="regist" class="tombol_login"><a href="login1.php">Login sebagai User</a></button><br><br>
        <button type="submit" name="login" class="tombol_login">Login</button>
        </center>
        </div>
    </form>
    <script src="script.js"></script>
</body>

</html>