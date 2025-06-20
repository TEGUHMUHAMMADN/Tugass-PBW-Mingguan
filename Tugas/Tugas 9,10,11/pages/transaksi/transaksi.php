<?php
include '../../includes/koneksi_db.php';
include '../../nav.php';

// Ambil daftar buku saja
$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
?>

<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Buat Pesanan</title>
</head>
<body>
<div class="container mt-4">
   <h2>Buat Pesanan Baru</h2>

   <?php if (isset($_GET['message'])): ?>
       <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
   <?php endif; ?>

   <form method="post" action="../../includes/transaksi/proses_transaksi.php">
       <!-- Input Nama Pelanggan -->
       <div class="mb-3">
           <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
           <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
       </div>

       <!-- Buku dan Kuantitas -->
       <h3>Daftar Buku</h3>
       <div class="mb-3">
           <label for="buku_id" class="form-label">Pilih Buku</label>
           <select class="form-select" name="buku[1][id]" id="buku_id" required>
               <option value="">Pilih Buku</option>
               <?php while ($row = $buku_result->fetch_assoc()): ?>
                   <option value="<?= $row['ID'] ?>"><?= htmlspecialchars($row['Judul']) ?></option>
               <?php endwhile; ?>
           </select>
       </div>
       <div class="mb-3">
           <label for="kuantitas" class="form-label">Jumlah Buku</label>
           <input type="number" class="form-control" id="kuantitas" name="buku[1][kuantitas]" required>
       </div>

       <button type="submit" class="btn btn-primary">Buat Pesanan</button>
   </form>
</div>
</body>
</html>
