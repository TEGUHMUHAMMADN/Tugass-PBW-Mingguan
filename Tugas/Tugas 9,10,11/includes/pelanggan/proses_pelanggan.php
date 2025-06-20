<?php
include '../../includes/koneksi_db.php';

$search_nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$search_email = isset($_GET['email']) ? $_GET['email'] : '';

$sql = "SELECT * FROM pelanggan WHERE 1";

if (!empty($search_nama)) {
    $nama = $conn->real_escape_string($search_nama);
    $sql .= " AND nama LIKE '%$nama%'";
}

if (!empty($search_email)) {
    $email = $conn->real_escape_string($search_email);
    $sql .= " AND email LIKE '%$email%'";
}

$result = $conn->query($sql);
