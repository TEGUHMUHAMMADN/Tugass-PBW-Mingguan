<?php
// Data praktikum
$praktikum = [
    "Praktikum 1" => "../praktikum 1/index.html",
    "Praktikum 2" => "../praktikum 2/index.html",
    "Praktikum 3.1" => "../praktikum 3.1/html-css.html",
    "Praktikum 3.2" => "../praktikum 3.2/index.html",
    "Praktikum 5" => "../praktikum 5/index.html",
    "Praktikum 6" => "../praktikum 6/halo.php",
    "Praktikum 7" => "../praktikum 7/index.php"
];

// Data tugas
$tugas = [
    "Tugas 1" => "../Tugas 1/index.html",
    "Tugas 2" => "../Tugas 2/index.html",
    "Tugas 3" => "../Tugas 3/index.html",
    "Tugas 5" => "../Tugas 5/index.html",
    "Tugas 6" => "../Tugas 6/index.php",
    "Tugas 7" => "../Tugas 7/latihan.php"
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Praktikum 8 - Tugas 1</title>
</head>
<body>
    <h1>Daftar Praktikum 1-7</h1>
    <ul>
        <?php foreach ($praktikum as $judul => $link): ?>
            <li><a href="<?= $link ?>"><?= $judul ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h1>Daftar Tugas 1-7</h1>
    <ul>
        <?php foreach ($tugas as $judul => $link): ?>
            <li><a href="<?= $link ?>"><?= $judul ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>