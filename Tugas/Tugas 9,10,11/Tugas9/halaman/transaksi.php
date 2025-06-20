<?php
include '../config/koneksi_db.php';;
include 'nav.php';

// Ambil data buku dari database
$buku = $conn->query("SELECT ID, Judul FROM buku");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Form Transaksi Buku</h2>
    <form action="../proses/proses_transaksi.php" method="post">
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" name="kontak" id="kontak">
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">Judul Buku</label>
            <select class="form-select" name="id_buku" id="id_buku" required>
                <option value="">-- Pilih Buku --</option>
                <?php while ($row = $buku->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>"><?= htmlspecialchars($row['Judul']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Proses Transaksi</button>
    </form>
</div>
</body>
</html>
