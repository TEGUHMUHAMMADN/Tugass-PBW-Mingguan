<?php
include '../../includes/koneksi_db.php';

if (!isset($_GET['id'])) {
    header("Location: daftar_pelanggan.php");
    exit();
}

$id = $_GET['id'];

// Ambil data pelanggan berdasarkan ID
$sql = "SELECT * FROM pelanggan WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Data pelanggan tidak ditemukan.";
    exit();
}

$data = $result->fetch_assoc();

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql_update = "UPDATE pelanggan SET Nama = ?, Email = ?, Alamat = ?, Telepon = ? WHERE ID = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssi", $nama, $email, $alamat, $telepon, $id);

    if ($stmt_update->execute()) {
        header("Location: ../../pages/pelanggan/daftar_pelanggan.php");
        exit();
    } else {
        echo "Gagal memperbarui data.";
    }
}
