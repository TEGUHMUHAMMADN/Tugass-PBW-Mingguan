<?php
$hari = "Senin";

switch ($hari) {
    case "Senin":
        echo "Hari pertama kerja!<br>";
        break;
    case "jum'at":
        echo "Solat jumat!<br>";
        break;
    case "Minggu":
        echo "Libur akhir pekan!<br>";
        break;
    default:
        echo "Hari biasa.<br>";
}

// Perulangan for angka 1-5
for ($i = 1; $i <= 5; $i++) {
    echo "Angka ke-" . $i . "<br>";
}

// Array buah dan perulangan
$buah = ["Apel", "Jeruk", "Mangga"];
for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
}

// Perulangan while
$nilai = 1;
while ($nilai <= 5) {
    echo "Nilai: " . $nilai . "<br>";
    $nilai++;
}

// Array asosiatif mahasiswa dan foreach
$mahasiswa = [
    "10001" => "Andi",
    "10002" => "Budi",
    "10003" => "Citra"
];
foreach ($mahasiswa as $nim => $nama) {
    echo "NIM: " . $nim . ", Nama: " . $nama . "<br>";
}

// Operator ternary untuk status umur
$umur = 18;
$status = ($umur >= 17) ? "Dewasa" : "Anak-anak";
echo $status . "<br>";

// Include dan require
include 'nama_file.php';
require 'nama_file.php';
?>

<!-- Menu navigasi -->
<?php
echo '<a href="index.php">Beranda</a> | <a href="about.php">Tentang</a> | <a href="contact.php">Kontak</a>';
?>

<!-- HTML dengan include file menu -->
<html>
    <body>
        <div class="menu">
            <?php include 'menu.php'; ?>
        </div>
    </body>
</html>
