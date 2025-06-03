<!DOCTYPE html>
<html>
<head>
    <title>Latihan Praktikum</title>
</head>
<body>
    <h1>Menu Navigasi</h1>
    <ul>
        <li><a href="latihan.php">Soal 1</a></li>
        <li><a href="latihan1.php">Soal 2</a></li>
        <li><a href="latihan2.php">Soal 3</a></li>
        <li><a href="latihan3.php">Soal 4</a></li>
    </ul>

    <div>
        <?php
        if (isset($_GET['page'])) {
            include $_GET['page'] . '.php';
        } else {
            echo "Pilih soal dari menu di atas.";
        }
        ?>
    </div>
</body>
</html>