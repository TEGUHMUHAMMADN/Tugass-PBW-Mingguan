<?php
include '../config/koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah pelanggan punya pesanan
    $cek = $conn->prepare("SELECT * FROM Pesanan WHERE Pelanggan_ID = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Pelanggan tidak bisa dihapus karena memiliki pesanan!');
            window.location.href = 'lihat_transaksi.php';
        </script>";
        exit;
    }

    // Hapus pelanggan
    $stmt = $conn->prepare("DELETE FROM Pelanggan WHERE ID = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Pelanggan berhasil dihapus!');
            window.location.href = 'lihat_transaksi.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus pelanggan!');
            window.location.href = 'lihat_transaksi.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak valid!');
        window.location.href = 'lihat_transaksi.php';
    </script>";
}
?>