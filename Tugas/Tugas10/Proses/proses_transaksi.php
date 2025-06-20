<?php
include '../confiq/koneksi_db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $conn->begin_transaction();

      try {
       $pelanggan_id = $_POST['pelanggan_id'];
       $nama_pelanggan = $_POST['nama_pelanggan'];
       $alamat_pelanggan = $_POST['alamat_pelanggan'];
       $email_pelanggan = $_POST['email_pelanggan'];
       $telepon_pelanggan = $_POST['telepon_pelanggan'];
       $tanggal_pesanan = date('Y-m-d');
       $total_harga = 0;

        //insert pelanggan baru ke tabel pelanggan
       $stmt = $conn ->prepare("INSERT INTO Pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");
       $stmt->bind_param("ssss", $nama_pelanggan, $alamat_pelanggan, $email_pelanggan, $telepon_pelanggan);
        $stmt ->execute();
        $pelanggan_id = $conn->insert_id;


       // Insert ke tabel Pesanan
       $stmt = $conn->prepare("INSERT INTO Pesanan (Tanggal_Pesanan, Pelanggan_ID, Total_Harga) VALUES (?, ?, ?)");
       $stmt->bind_param("sid", $tanggal_pesanan, $pelanggan_id, $total_harga);
       $stmt->execute();
       $pesanan_id = $conn->insert_id;



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


           // Insert detail
           $stmt = $conn->prepare("INSERT INTO Detail_Pesanan (Pesanan_ID, Buku_ID, Kuantitas, Harga_Per_Satuan) VALUES (?, ?, ?, ?)");
           $stmt->bind_param("iiid", $pesanan_id, $buku_id, $kuantitas, $harga_per_satuan);
           $stmt->execute();


           $total_harga += $kuantitas * $harga_per_satuan;


           // Update stok
           $stmt = $conn->prepare("UPDATE Buku SET Stok = Stok - ? WHERE ID = ?");
           $stmt->bind_param("ii", $kuantitas, $buku_id);
           $stmt->execute();
       }


       // Update total harga
       $stmt = $conn->prepare("UPDATE Pesanan SET Total_Harga = ? WHERE ID = ?");
       $stmt->bind_param("di", $total_harga, $pesanan_id);
       $stmt->execute();


       $conn->commit();
       header("Location: ../Halaman/transaksi.php?message=" . urlencode("Pesanan berhasil dibuat."));
       exit;
   } catch (Exception $e) {
       $conn->rollback();
       header("Location: ../Halaman/transaksi.php?message=" . urlencode("Gagal membuat pesanan: " . $e->getMessage()));
       exit;
   }
}
?>