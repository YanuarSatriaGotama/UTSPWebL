<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "toko";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("Gagal terhubung ke database " . mysqli_connect_error());
}
