<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET["id"];
$read_sql = "SELECT * FROM orderan WHERE id = $id";

$result = mysqli_query($conn, $read_sql);

$orderan = [];

while ($row = mysqli_fetch_assoc($result)) {
    $orderan[] = $row;
}

$orderan = $orderan[0];

if (isset($_POST["submit"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $tujuan = htmlspecialchars($_POST["tujuan"]);
    $jenis = htmlspecialchars($_POST["jenis"]);
    $barang = htmlspecialchars($_POST["barang"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);

    $update_sql = "UPDATE orderan SET nama = '$nama', tujuan='$tujuan', jenis='$jenis', barang='$barang', jumlah='$jumlah', tanggal= '$tanggal' WHERE id='$id'";
    $result = mysqli_query($conn, $update_sql);

    if ($result) {
        echo "<script>
            alert('Data berhasil diupdate!');
            document.location.href = 'index0.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diupdate!');
            document.location.href = 'update0.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Update Orderan</title>
</head>

<body id="badan">

	<!-- navbar -->
	<div class="medsos">
		<div class="container">
			<ul> 
				<li><a href="#"><i class="fab fa-facebook"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				<li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
			</ul>
		</div>
	</div>
	<header>
		<div class="container">
			<div class="sticky">
            <h1><img src="brodo.png" alt="Brodo Logo" style="height: 40px; margin-right: 10px;">TOKO PAKAIAN PRIA BRODO</h1>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li class="active"><a href="index0.php">TRANSAKSI</a></li>
					<li><a href="index1.php">BAJU</a></li>
					<li><a href="index2.php">CELANA</a></li>
					<li><a href="index3.php">JAKET</a></li>
				</ul>
		</div>
	</header>

<body id="badan">
<div class="kotak_login">
    <h1 class="title">Update Data Orderan</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $orderan["id"]; ?>">
        <label for="nama">Nama</label><br>
        <input type="text" class="form_update" name="nama" id="nama" value="<?= $orderan["Nama"]; ?>"><br><br>
        <label for="tujuan">Tujuan</label><br>
        <input type="text" class="form_update" name="tujuan" id="tujuan" value="<?= $orderan["Tujuan"]; ?>"><br><br>
        <label for="jenis">Jenis</label><br>
        <input type="text" class="form_update" name="jenis" id="jenis" value="<?= $orderan["Jenis"]; ?>"><br><br>
        <label for="barang">Barang</label><br>
        <input type="text" class="form_update" name="barang" id="barang" value="<?= $orderan["Barang"]; ?>"><br><br>
        <label for="jumlah">Jumlah</label><br>
        <input type="number" class="form_update" name="jumlah" id="jumlah" value="<?= $orderan["Jumlah"]; ?>"><br><br>
        <label for="tanggal">Tanggal Beli(YYYY-MM-DD): </label>
        <input type="text" class="form_update" name="tanggal" id="tanggal" value="<?= $orderan["Tanggal"]; ?>"><br><br>
        <button type="submit" class="tombol_login" name="submit">Update</button>
    </form>
</div>
	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2021 - Yanuar Satria Gotama, All Rights Reserved.</small>
		</div>
	</footer>
    <script src="script.js"></script>
</body>
</html>