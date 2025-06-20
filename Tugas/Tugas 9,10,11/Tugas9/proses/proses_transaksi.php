<?php
include '../config/koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_buku = $_POST['id_buku'];
    $jumlah = $_POST['jumlah'];
    $id_pelanggan = $_POST['id_pelanggan']; // Jika ada

    // 1. Cek stok buku
    $stmt = $conn->prepare("SELECT stok, harga FROM Buku WHERE ID = ?");
    $stmt->bind_param("i", $id_buku);
    $stmt->execute();
    $result = $stmt->get_result();
    $buku = $result->fetch_assoc();

    if (!$buku) {
        echo "<script>alert('Buku tidak ditemukan'); window.location.href = '../halaman/transaksi.php';</script>";
        exit;
    }

    $stok = $buku['stok'];
    $harga = $buku['harga'];

    if ($jumlah > $stok) {
        echo "<script>alert('Jumlah pesanan melebihi stok. Stok tersedia: $stok'); window.location.href = '../halaman/transaksi.php';</script>";
        exit;
    }

    // 2. Tambahkan ke tabel pesanan
    $stmt = $conn->prepare("INSERT INTO pesanan (id_pelanggan, tanggal) VALUES (?, NOW())");
    $stmt->bind_param("i", $id_pelanggan);
    $stmt->execute();
    $id_pesanan = $stmt->insert_id;

    // 3. Tambahkan ke detail_pesanan
    $stmt = $conn->prepare("INSERT INTO detail_pesanan (id_pesanan, id_buku, jumlah, harga_satuan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiii", $id_pesanan, $id_buku, $jumlah, $harga);
    $stmt->execute();

    // 4. Kurangi stok buku
    $stmt = $conn->prepare("UPDATE Buku SET stok = stok - ? WHERE ID = ?");
    $stmt->bind_param("ii", $jumlah, $id_buku);
    $stmt->execute();

    echo "<script>alert('Transaksi berhasil disimpan'); window.location.href = '../halaman/transaksi.php';</script>";
}
?>