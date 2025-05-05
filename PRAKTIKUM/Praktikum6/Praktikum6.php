<?php
echo "Halo, Selamat datang di dunia PHP!";
?>

<?php
// Variabel dan Output
$nama = "Budi";
$umur = 20;

echo "Nama: " . $nama . "<br>";
echo "Umur: " . $umur . " tahun<br>";
?>

<?php
// Konstanta
define("NAMA_KONSTANTA", "nilai");
define("SITE_NAME", "unsika.ac.id");
define("VERSION", "1.0");

echo "Selamat datang di " . SITE_NAME . "<br>";
echo "Versi Sistem: " . VERSION . "<br>";
?>

<?php
// Tipe Data

// String
$nama = "Andi";
echo "Nama saya adalah " . $nama . "<br>";

// Integer
$umur = 25;
echo "Umur saya " . $umur . " tahun<br>";

// Float
$berat = 55.5;
echo "Berat badan saya " . $berat . "kg<br>";

// Boolean
$isLogin = true;

// Array
$buah = ["apel", "jeruk", "mangga"];
echo "Buah favorit: " . $buah[1] . "<br>";
?>

<?php
// Object (Class dan Instance)
class Mahasiswa {
    public $nama;
    public function sapa() {
        return "Halo, saya $this->nama";
    }
}
$mhs = new Mahasiswa();
$mhs->nama = "Jeni";
echo $mhs->sapa() . "<br>";
?>

<?php
// NULL
$data = null;
var_dump($data);
?>