<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM Buku WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman hapus_buku.php dengan status sukses
        header("Location: ../halaman/hapus_buku.php?status=sukses");
        exit;
    } else {
        // Redirect dengan status gagal + error
        header("Location: ../halaman/hapus_buku.php?status=gagal&msg=" . urlencode($stmt->error));
        exit;
    }

    $stmt->close();
} else {
    header("Location: ../halaman/hapus_buku.php?status=gagal&msg=" . urlencode("ID tidak valid"));
    exit;
}

$conn->close();