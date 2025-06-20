<?php
include '../../includes/koneksi_db.php';
$id = $_GET['id'];
$sql = "DELETE FROM pelanggan WHERE ID = $id";
$conn->query($sql);
header("Location: ../../pages/pelanggan/daftar_pelanggan.php");
?>
