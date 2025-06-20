<?php
include '../../includes/pelanggan/proses_edit_pelanggan.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Edit Pelanggan</title>
</head>
<body>
   <?php include '../../nav.php'; ?>
   <div class="container mt-4">
       <h2>Edit Data Pelanggan</h2>
       <form method="post">
           <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['Nama']) ?>" required>
           </div>
           <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['Email']) ?>" required>
           </div>
           <div class="mb-3">
               <label for="alamat" class="form-label">Alamat</label>
               <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo htmlspecialchars($data['Alamat']) ?></textarea>
           </div>
           <div class="mb-3">
               <label for="telepon" class="form-label">Telepon</label>
               <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo htmlspecialchars($data['Telepon']) ?>" required>
           </div>
           <button type="submit" class="btn btn-success">Simpan Perubahan</button>
           <a href="daftar_pelanggan.php" class="btn btn-secondary">Batal</a>
       </form>
   </div>
</body>
</html>
