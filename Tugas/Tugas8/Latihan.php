<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai</title>
</head>
<body>

<h2>Form Input Nilai Mahasiswa</h2>
<form method="post" action="">
    Nama Mahasiswa: <input type="text" name="nama"><br><br>
    Nilai Ujian: <input type="number" name="nilai"><br><br>
    <input type="submit" value="Proses">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    $predikat = "";
    $status = "";

    // Validasi dan konversi predikat
    if ($nilai >= 85 && $nilai <= 100) {
        $predikat = "A";
    } elseif ($nilai >= 75 && $nilai <= 84) {
        $predikat = "B";
    } elseif ($nilai >= 65 && $nilai <= 74) {
        $predikat = "C";
    } elseif ($nilai >= 50 && $nilai <= 64) {
        $predikat = "D";
    } elseif ($nilai >= 0 && $nilai <= 49) {
        $predikat = "E";
    } else {
        $predikat = "Tidak valid";
    }

    // Status lulus atau tidak
    if ($predikat == "A" || $predikat == "B" || $predikat == "C") {
        $status = "Lulus";
    } elseif ($predikat == "D" || $predikat == "E") {
        $status = "Tidak Lulus";
    } else {
        $status = "-";
    }

    // Menampilkan hasil
    echo "<h3>Hasil:</h3>";
    echo "Nama : " . htmlspecialchars($nama) . "<br>";
    echo "Nilai : " . htmlspecialchars($nilai) . "<br>";
    echo "Predikat : " . $predikat . "<br>";
    echo "Status : " . $status . "<br>";
}
?>

</body>
</html>