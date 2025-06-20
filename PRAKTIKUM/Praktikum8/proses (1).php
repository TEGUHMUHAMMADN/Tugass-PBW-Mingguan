<?php
// File: proses.php

// Mengambil data dari metode POST
$var_nama = $_POST['nama'];
$var_email = $_POST['email'];

// Menampilkan nama dengan validasi
if (!empty($_POST['nama'])) {
    echo "Nama: " . htmlspecialchars($_POST['nama']) . "<br>";
} else {
    echo "Nama tidak boleh kosong!<br>";
}

// Contoh mengambil data dari URL (GET)
// Contoh URL: http://localhost/proses.php?nama=andre&email=gmail
$nama_get = $_GET['nama'] ?? null;
$email_get = $_GET['email'] ?? null;

// Menampilkan jika data dari GET tersedia
if ($nama_get && $email_get) {
    echo "Data dari URL - Nama: " . htmlspecialchars($nama_get) . ", Email: " . htmlspecialchars($email_get) . "<br>";
}

// Menentukan predikat nilai
$nilai = 75;

if ($nilai >= 80) {
    echo "Nilai A<br>";
} elseif ($nilai >= 70) {
    echo "Nilai B<br>";
} else {
    echo "Nilai C<br>";
}

// Cek umur dan kepemilikan KTP
$umur = 20;
$ktp = true;

if ($umur >= 17 && $ktp) {
    echo "Boleh memilih<br>";
}
?>
