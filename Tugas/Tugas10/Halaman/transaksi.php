<?php
include '../confiq/koneksi_db.php';
include 'nav.php';


// Ambil daftar buku dan pelanggan
$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
$pelanggan_result = $conn->query("SELECT ID, Nama FROM Pelanggan");
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Buat Pesanan</title>
</head>
<body>
<div class="container mt-4">
     <?php if (isset($_GET['message'])): ?>
       <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
   <?php endif; ?>

   <form method="post" action="../Proses/proses_transaksi.php">
       <div class="mb-3">
           <h3>Data Pelanggan</h3>
           <div class="mb-3">
               <label for="nama_pelanggan" class="form-label">Nama Pelanggan*</label>
               <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
           </div>
           <div class="mb-3">
               <label for="alamat_pelanggan" class="form-label">Alamat</label>
               <textarea class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" rows="2"></textarea>
           </div>
           <div class="mb-3">
               <label for="email_pelanggan" class="form-label">Email*</label>
               <input type="email" class="form-control" id="email_pelanggan" name="email_pelanggan" required>
           </div>
           <div class="mb-3">
               <label for="telepon_pelanggan" class="form-label">Telepon*</label>
               <input type="tel" class="form-control" id="telepon_pelanggan" name="telepon_pelanggan" required>
               <small class="text-muted">Format: 081234567890</small>
           </div>
       </div>


       <h3>Daftar Buku</h3>
       <div class="mb-3">
           <label for="buku_id" class="form-label">Pilih Buku</label>
           <select class="form-select" name="buku[1][id]" id="buku_id" required>
               <option value="">Pilih Buku</option>
               <?php while ($row = $buku_result->fetch_assoc()): ?>
                   <option value="<?= $row['ID'] ?>"><?= $row['Judul'] ?></option>
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