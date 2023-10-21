<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM jaket WHERE barang LIKE '%$keyword%'";
    $result = mysqli_query($conn, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM jaket";
    $result = mysqli_query($conn, $read_sql);
}

$jaket = [];

while ($row = mysqli_fetch_assoc($result)) {
    $jaket[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Read Data</title>
</head>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body id="badan">

	<!-- navbar -->
	<div class="medsos">
		<div class="container">
			<ul> 
				<li><a href="#"><i class="fab fa-facebook"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				<li><a href="https://wa.me/6281240741502"><i class="fab fa-whatsapp"></i></a></li>
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
					<li><a href="index2.php">CELANA</a></li>
					<li class="active"><a href="index3.php">JAKET</a></li>
				</ul>
		</div>
	</header>

    <section class="content">
    <h1 class="title">DATA JAKET</h1>
    <center>
    <a href="create3.php"><button class="create">Tambah Data</button></a>
    <a href="delete_all3.php"><button class="delete_all" type="submit" name="hapus">HAPUS SEMUA</button></a>
    <a href="sort3.php"><button class="sorting" type="submit" name="logout">Sorting</button></a>
    <a href="index.php"><button class="sorting" type="submit" name="home">Kembali</button></a>
    <a href="logout.php"><button class="logout" type="submit" name="logout">Keluar</button></a>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Masukkan Keyword " autofocus autocomplete="off">
        <button class="search" type="submit" name="cari">Search</button>
        <a href="index3.php"><button class="refresh">Refresh</button></a>
    </form>
    </center>
    <table border=2 cellspacing=2 cellpadding=10>
        <tr>
            <th>ID</th>
            <th>BARANG</th>
            <th>STOK</th>
            <th>HARGA</th>
            <th>RESTOCK DATE</th>
            <th>ACTION</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($jaket as $jkt) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $jkt["Barang"] ?></td>
                <td><?= $jkt["Stok"] ?></td>
                <td><?= $jkt["Harga"] ?></td>
                <td><?= $jkt["Restock"] ?></td>
                <td>
                    <a href="update3.php?id=<?= $jkt["id"]; ?>"><button class="update" ><i class="fas fa-pen"></i></button></a>
                    <a href="delete3.php?id=<?= $jkt["id"]; ?>"><button class="delete" ><i class="fas fa-trash"></i></button></a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </section>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2021 - Yanuar Satria Gotama, All Rights Reserved.</small>
		</div>
	</footer>
    <script src="script.js"></script>
</body>
</html>