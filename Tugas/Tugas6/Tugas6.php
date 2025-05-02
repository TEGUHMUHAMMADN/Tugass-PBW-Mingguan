<?php
define("PAJAK", 0.10);

$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];

// Jumlah beli
$jumlah_beli = 2;

// Hitung total
$total = $barang["harga"] * $jumlah_beli;
$pajak = $total * PAJAK;
$total_bayar = $total + $pajak;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Total Pembelian</title>
    <style>
        .kotak {
            border: 2px solid black;
            width: 400px;
            padding: 15px;
            font-family: Arial, sans-serif;
        }
        .judul {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }
        .teks {
            font-size: 16px;
            margin: 4px 0;
        }
        .teks-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="kotak">
        <div class="judul">Perhitungan Total Pembelian</div>
        <div class="teks">Nama Barang: <?php echo $barang["nama"]; ?></div>
        <div class="teks">Harga Satuan: Rp <?php echo number_format($barang["harga"], 0, ',', '.'); ?></div>
        <div class="teks">Jumlah Beli: <?php echo $jumlah_beli; ?></div>
        <div class="teks">Total Harga (Sebelum Pajak): Rp <?php echo number_format($total, 0, ',', '.'); ?></div>
        <div class="teks">Pajak (10%): Rp <?php echo number_format($pajak, 0, ',', '.'); ?></div>
        <div class="teks teks-bold">Total Bayar: Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></div>
    </div>
</body>
</html>