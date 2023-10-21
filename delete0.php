<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET["id"];

$delete_sql = "DELETE FROM orderan WHERE id = $id";
$result = mysqli_query($conn, $delete_sql);

if ($result) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'index0.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'index0.php';
    </script>";
}

?>