<?php
include '../../includes/koneksi_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO pelanggan (Nama, Email, Alamat, Telepon) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $alamat, $telepon);

    if ($stmt->execute()) {
        header("Location: ../../pages/pelanggan/daftar_pelanggan.php");
        exit();
    } else {
        echo "Gagal menambahkan pelanggan: " . $conn->error;
    }
}
