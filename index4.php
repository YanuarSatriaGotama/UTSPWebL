<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login1.php');
    exit;
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM baju WHERE barang LIKE '%$keyword%'";
    $result = mysqli_query($conn, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM baju";
    $result = mysqli_query($conn, $read_sql);
}

$baju = [];

while ($row = mysqli_fetch_assoc($result)) {
    $baju[] = $row;
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM celana WHERE barang LIKE '%$keyword%'";
    $result = mysqli_query($conn, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM celana";
    $result = mysqli_query($conn, $read_sql);
}

$celana = [];

while ($row = mysqli_fetch_assoc($result)) {
    $celana[] = $row;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>ORDERAN</title>
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
		</div>
	</header>

    <section class="content">
    <h1 class="title">DATA PRODUCT</h1>
    <center>
    <a href="create4.php"><button class="create">Beli Sekarang</button></a>
    <a href="index4.php"><button class="sorting" type="submit" name="home">Refresh</button></a>
    <a href="logout.php"><button class="logout" type="submit" name="logout">Keluar</button></a>
    </center>

    <style>
    table {
        width: 37%; /* Sesuaikan lebar tabel dengan lebar layar */
    }
</style>

    <table border=2 cellspacing=2 cellpadding=10>
        <tr>
            <th>ID</th>
            <th>BARANG</th>
            <th>STOK</th>
            <th>HARGA</th>
            <th>RESTOCK DATE</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($baju as $ctr) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $ctr["Barang"] ?></td>
                <td><?= $ctr["Stok"] ?></td>
                <td><?= $ctr["Harga"] ?></td>
                <td><?= $ctr["Restock"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <table border=2 cellspacing=2 cellpadding=10>
        <tr>
            <th>ID</th>
            <th>BARANG</th>
            <th>STOK</th>
            <th>HARGA</th>
            <th>RESTOCK DATE</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($celana as $cln) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $cln["Barang"] ?></td>
                <td><?= $cln["Stok"] ?></td>
                <td><?= $cln["Harga"] ?></td>
                <td><?= $cln["Restock"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <table border=2 cellspacing=2 cellpadding=10>
        <tr>
            <th>ID</th>
            <th>BARANG</th>
            <th>STOK</th>
            <th>HARGA</th>
            <th>RESTOCK DATE</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($jaket as $jkt) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $jkt["Barang"] ?></td>
                <td><?= $jkt["Stok"] ?></td>
                <td><?= $jkt["Harga"] ?></td>
                <td><?= $jkt["Restock"] ?></td>
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