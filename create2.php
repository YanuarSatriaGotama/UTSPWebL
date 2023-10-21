<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST["submit"])) {
    $barang = htmlspecialchars($_POST["barang"]);
    $stok = htmlspecialchars($_POST["stok"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $restock = htmlspecialchars($_POST["restock"]);

    $insert_sql = "INSERT INTO celana VALUES ('','$barang','$stok','$harga','$restock')";
    $result = mysqli_query($conn, $insert_sql);

    if ($result) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index2.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'create2.php';
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
    <title>Tambah Celana</title>
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
					<li><a href="index0.php">TRANSAKSI</a></li>
					<li><a href="index1.php">BAJU</a></li>
					<li class="active"><a href="index2.php">CELANA</a></li>
					<li><a href="index3.php">JAKET</a></li>
				</ul>
		</div>
	</header>

<body id="badan">
    <div class="kotak_login">
    <h1 class="title"><b>Tambah Celana</b></h1>
    <form action="" method="post">
        <label for="barang">Barang</label><br>
        <input type="text" class="form_update" name="barang" id="barang" autocomplete="off"><br><br>
        <label for="stok">Stok</label><br>
        <input type="number" class="form_update" name="stok" id="stok" autocomplete="off"><br><br>
        <label for="harga">Harga</label><br>
        <input type="text" class="form_update" name="harga" id="harga" autocomplete="off"><br><br>
        <label for="restock">Restock date(YYYY-MM-DD): </label>
        <input type="text" class="form_update" name="restock" autocomplete="off"><br><br>
        <button type="submit" class="tombol_login" name="submit">Submit</button>
        </div>
    </form>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2021 - Yanuar Satria Gotama, All Rights Reserved.</small>
		</div>
	</footer>
    <script src="script.js"></script>
</body>
</html>