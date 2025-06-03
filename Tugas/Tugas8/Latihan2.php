<?php
// Data input mahasiswa
$npm = "2310631170054";
$nama = "Teguh Muhammad nurhakim";
$prodi = "Pemograman Berbasis Web";
$semester = 9;
$biaya_ukt = 5000000;

// Perhitungan diskon
$diskon = 0;
if ($biaya_ukt >= 5000000) {
    $diskon = 10;
    if ($semester > 8) {
        $diskon += 5;
    }
}

$potongan = ($diskon / 100) * $biaya_ukt;
$total_bayar = $biaya_ukt - $potongan;

// Output
echo "<b>Luaran yang diharuskan</b><br>";
echo "NPM : $npm<br>";
echo "NAMA : $nama<br>";
echo "PRODI : $prodi<br>";
echo "SEMESTER : $semester<br>";
echo "BIAYA UKT : Rp. " . number_format($biaya_ukt, 0, ',', '.') . ",-<br>";
echo "DISKON : $diskon%<br>";
echo "YANG HARUS DIBAYAR : Rp. " . number_format($total_bayar, 0, ',', '.') . ",-<br>";
?>