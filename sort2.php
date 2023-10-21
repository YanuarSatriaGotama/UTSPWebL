<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
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
    <title>Sorting Celana</title>
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
					<li  class="active"><a href="index2.php">CELANA</a></li>
					<li><a href="index3.php">JAKET</a></li>
				</ul>
		</div>
	</header>

<body>
<section class="content">
    <h1 class="title">SORTING CELANA</h1>
            <form action="" method="post">
                <center>
                <button class="sort" type="ascen" name="ascending">Ascending</button>
                <button class="sort" type="descen" name="descending">Descending</button>
                </center>
            </form>
            <?php
                if (isset($_POST["ascending"])) {
                    $select_sql1 = "SELECT * FROM celana ORDER BY Harga ASC";
                    $result = mysqli_query($conn, $select_sql1);

                } else if (isset($_POST["descending"])) {
                    $select_sql2 = "SELECT * FROM celana ORDER BY Harga DESC";
                    $result = mysqli_query($conn, $select_sql2);
                } else {
                    $select_sql3 = "SELECT *FROM celana";
                    $result = mysqli_query($conn, $select_sql3);
                }
                $celana = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $celana[] = $row;
                }
            ?>
        <table border=2 cellspacing=2 cellpadding=10>
            <tr>
                <th>ID</th>
                <th>BARANG</th>
                <th>STOK</th>
                <th>HARGA</th>
                <th>RESTOCK DATE</th>
                <th>ACTION</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($celana as $cln) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $cln["Barang"] ?></td>
                <td><?= $cln["Stok"] ?></td>
                <td><?= $cln["Harga"] ?></td>
                <td><?= $cln["Restock"] ?></td>
                <td>
                    <a href="update2.php?id=<?= $cln["id"]; ?>"><button class="update" ><i class="fas fa-pen"></i></button></a>
                    <a href="delete2.php?id=<?= $cln["id"]; ?>"><button class="delete" ><i class="fas fa-trash"></i></button></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <center><a href="index2.php"><button class="create"> Kembali </button></a></center>
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