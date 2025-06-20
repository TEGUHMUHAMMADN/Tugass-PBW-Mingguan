<?php
include '../koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $conn->begin_transaction();
   try {
       $nama_pelanggan = trim($_POST['nama_pelanggan']);
       $tanggal_pesanan = date('Y-m-d');
       $total_harga = 0;

       // Cek apakah pelanggan sudah ada
       $stmt = $conn->prepare("SELECT ID FROM Pelanggan WHERE Nama = ?");
       $stmt->bind_param("s", $nama_pelanggan);
       $stmt->execute();
       $stmt->store_result();

       if ($stmt->num_rows > 0) {
           $stmt->bind_result($pelanggan_id);
           $stmt->fetch();
       } else {
           // Insert pelanggan baru
           $stmt = $conn->prepare("INSERT INTO Pelanggan (Nama) VALUES (?)");
           $stmt->bind_param("s", $nama_pelanggan);
           $stmt->execute();
           $pelanggan_id = $stmt->insert_id;
       }
       $stmt->close();

       // Insert ke tabel Pesanan
       $stmt = $conn->prepare("INSERT INTO Pesanan (Tanggal_Pesanan, Pelanggan_ID, Total_Harga) VALUES (?, ?, ?)");
       $stmt->bind_param("sid", $tanggal_pesanan, $pelanggan_id, $total_harga);
       $stmt->execute();
       $pesanan_id = $conn->insert_id;
       $stmt->close();

       // Loop buku
       foreach ($_POST['buku'] as $buku) {
           $buku_id = $buku['id'];
           $kuantitas = $buku['kuantitas'];

           // Ambil harga dan stok
           $stmt = $conn->prepare("SELECT Harga, Stok FROM Buku WHERE ID = ?");
           $stmt->bind_param("i", $buku_id);
           $stmt->execute();
           $stmt->bind_result($harga_per_satuan, $stok);
           $stmt->fetch();
           $stmt->close();

           if ($stok < $kuantitas) {
               throw new Exception("Stok buku ID $buku_id tidak cukup.");
           }

           // Insert ke detail pesanan
           $stmt = $conn->prepare("INSERT INTO Detail_Pesanan (Pesanan_ID, Buku_ID, Kuantitas, Harga_Per_Satuan) VALUES (?, ?, ?, ?)");
           $stmt->bind_param("iiid", $pesanan_id, $buku_id, $kuantitas, $harga_per_satuan);
           $stmt->execute();
           $stmt->close();

           $total_harga += $kuantitas * $harga_per_satuan;

           // Kurangi stok
           $stmt = $conn->prepare("UPDATE Buku SET Stok = Stok - ? WHERE ID = ?");
           $stmt->bind_param("ii", $kuantitas, $buku_id);
           $stmt->execute();
           $stmt->close();
       }

       // Update total harga
       $stmt = $conn->prepare("UPDATE Pesanan SET Total_Harga = ? WHERE ID = ?");
       $stmt->bind_param("di", $total_harga, $pesanan_id);
       $stmt->execute();
       $stmt->close();

       $conn->commit();
       header("Location: ../../pages/transaksi/transaksi.php?message=" . urlencode("Pesanan berhasil dibuat."));
       exit;

   } catch (Exception $e) {
       $conn->rollback();
       header("Location: ../../pages/transaksi/transaksi.php?message=" . urlencode("Gagal membuat pesanan: " . $e->getMessage()));
       exit;
   }
}
?>
